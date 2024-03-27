<button wire:click="toggleLike" class="nav-link
@if($this->isliked)
active
@endif
" href="#!" type="button" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" data-bs-custom-class="tooltip-text-start" data-bs-title="">
    @if($this->isliked)
        <i class="bi bi-hand-thumbs-up-fill pe-1"></i>
        Liked
    @else
        <i class="bi bi-hand-thumbs-up pe-1"></i>
        Like
    @endif
         ({{$this->comment->likes_number}})
</button>
