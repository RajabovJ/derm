<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewPostNotification;

class PostController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        switch ($user->role->name) {
            case 'doctor':
                $posts = Post::whereIn('visibility', ['public', 'doctor_only'])->orderBy('created_at', 'desc')->paginate(12);
                return view('doctor.posts.index', [
                    'posts'=>$posts,
                    'user'=>$user,
                ]);
            case 'admin':
                $posts = Post::orderBy('created_at', 'desc')->paginate(15);
                return view('admin.posts.index', [
                    'posts'=>$posts,
                    'user'=>$user,
                ]);
            default:
                abort(403, 'Sizga bu sahifani ko‘rishga ruxsat berilmagan.');
            }

    }
    public function create()
    {
        $user = Auth::user();
        $this->authorize('create', Post::class);
        switch ($user->role->name) {
            case 'admin':
                return view('admin.posts.create', [
                    'user'=> $user,
                ]);
            default:
                abort(403, 'Sizda ushbu sahifaga ruxsat yo‘q.');
        }
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $this->authorize('create', Post::class);
        $data['user_id'] = auth()->id();
        if ($request->hasFile('image_url')) {
            $data['image_url'] = $request->file('image_url')->store('post_images', 'public');
        } else {
            $data['image_url'] = 'post_images/default.jpg';
        }
        $post = Post::create($data);
        if ($post->visibility === 'doctor_only') {
            $doctors = User::whereHas('role', function ($query) {
                $query->where('name', 'doctor');
            })->get();
            foreach ($doctors as $doctor) {
                $doctor->notify(new NewPostNotification($post));
            }
        }
        return redirect()->to(localized_route('posts.index'))
        ->with('success', __('Post muvaffaqiyatli yaratildi.'));

    }
    public function show($locale, Post $post, $notificationId = null)
    {
        $user = auth()->user();
        $this->authorize('view', $post);
        $post->increment('views');

        if ($notificationId) {
            // Agar bildirishnoma ID ko‘rsatilgan bo‘lsa — uni bevosita topib o‘qilgan deb belgilaymiz
            $notification = $user->notifications->find($notificationId);
            if ($notification) {
                $notification->markAsRead();
            }
        } else {
            // Aks holda, foydalanuvchining shu postga oid o‘qilmagan notification'ini topamiz
            $notification = $user->unreadNotifications
                ->first(function ($n) use ($post) {
                    return isset($n->data['post_id']) && $n->data['post_id'] == $post->id;
                });

            if ($notification) {
                $notification->markAsRead();
            }
        }

        switch ($user->role->name) {
            case 'doctor':
                return view('doctor.posts.show', compact('post', 'user'));
            case 'admin':
                return view('admin.posts.show', compact('post', 'user'));
            default:
                abort(403, 'Sizga bu sahifani ko‘rishga ruxsat berilmagan.');
        }
    }



    public function edit(Post $post)
    {
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
    }
    public function destroy(Post $post)
    {
    }
}
