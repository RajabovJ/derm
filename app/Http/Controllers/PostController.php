<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

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
        Post::create($data);
        return redirect()->route('posts.index')->with('success', 'Post muvaffaqiyatli yaratildi.');
    }
    public function show(Post $post)
    {
        $user = Auth::user();
        $this->authorize('view', $post);
        $post->increment('views');
        switch ($user->role->name) {
            case 'doctor':
                return view('doctor.posts.show', [
                    'post'=>$post,
                    'user'=>$user,
                ]);
            case 'admin':
                return view('admin.posts.show', [
                    'post'=>$post,
                    'user'=>$user,
                ]);
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
