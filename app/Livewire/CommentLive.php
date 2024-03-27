<?php


namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Comment;
use App\Models\CommentFile;

/**
 * Class CommentLive
 * A livewire component for creating comments with optional files
 */
class CommentLive extends Component
{
    use WithFileUploads;
    
    public $post;
    public $text = '';
    public $file;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function fileTrigger(){
        $this->dispatchBrowserEvent('TriggerFilem');
    }

    public function save()
    {
        $id = Auth::user()->id;
        // dd($this->file);
        // if(empty($this->text) && !$this->file){
        //     return;
        // }
        if ($this->file != null) {
            $this->validate([
                'file' => 'file|max:10000',
                'text' => 'max:200',
            ]);
            $prefix = $this->file->extension();
            $fileName = $this->post->id . time() . $id .'.'.$prefix;
            // Livewire\Features\SupportFileUploads\TemporaryUploadedFile::getMimeType()
            $mimeType = $this->file->getMimeType();

            // Specify the file type based on the mime type
            if (str_starts_with($mimeType, 'image/')) {
                $fileType = 'images';
            } elseif (str_starts_with($mimeType, 'video/')) {
                $fileType = 'videos';
            } elseif ($mimeType == 'audio/mpeg' || $mimeType == 'audio/wav') {
                $fileType = 'voice';
            } else {
                $fileType = 'files';
            }
            
            $filePath = 'comment_' . $fileType;
            
            $this->file->storeAs('public', $filePath."/".$fileName);
            $comment = Comment::create([
                'user_id' => $id,
                'post_id' => $this->post->id,
                'text' => $this->text
            ]);
            CommentFile::create([
                'comment_id' => $comment->id,
                'file_path' => $filePath.'/'.$fileName,
                'file_type' => $fileType,
                'prefix' => $prefix
            ]);
        } else {
            $this->validate([
                'text' => 'required|max:200' 
            ]);
            $id = Auth::user()->id;
            Comment::create([
                'user_id' => $id,
                'post_id' => $this->post->id,
                'text' => $this->text
            ]);
        }
        $this->reset('file', 'text');
    }

    /**
     * Render the component view with the latest comment
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $comment = $this->post->comment()->latest()->take(1)->get();
        $comments = $comment->first();

        return view('livewire.comment-live', ['comment' => $comments]);
    }
}

