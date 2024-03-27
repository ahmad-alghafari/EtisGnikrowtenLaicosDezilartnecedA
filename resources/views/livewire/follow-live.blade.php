<button wire:click="toggleFollow"
        @if($this->isFollow)
         class="btn btn-secondary me-2"
        @else
            class="btn btn-primary-soft me-2"
        @endif
         type="button" href="#!">
    @if($this->isFollow)
        Following
    @else
        Follow
    @endif
</button>
