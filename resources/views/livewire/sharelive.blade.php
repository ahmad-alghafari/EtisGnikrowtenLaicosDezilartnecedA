<button wire:click="shareing" class="nav-link mb-0 
@if($this->isshared)
active
@endif
" href="#" id="cardShareAction" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share 
    ({{$this->post->share_number}})
</button>