@props(['chirp'])

<div class="card">
  <div class="card-body bg-base-100 flex space-x-3 rounded-md shadow">
    <div class="avatar flex justify-between">
      @if ($chirp->user)
        <div class="size-10 rounded-full">
          <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->name) }}"
            alt="{{ $chirp->user->name }}'s avatar" class="rounded-full" />
        </div>
        @if ($chirp->user_id == Auth::id())
          <div class="gap-x-1 h-fit aspect-auto grid grid-cols-2">
            <button class="btn btn-primary">Edit</button>
            <form method="post" action="/chirps/{{ $chirp->id }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-secondary">Delete</button>
            </form>
          </div>
        @endif
      @else
        <div class="size-10 rounded-full">
          <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
            alt="Anonymous User" class="rounded-full" />
        </div>
      @endif
    </div>

    <div class="min-w-0">
      <div class="flex items-center gap-1">
        <span class="text-sm font-semibold">{{ $chirp->user ? $chirp->user->name : 'Anonymous' }}</span>
        <span class="text-base-content/60">·</span>
        <span class="text-base-content/60 text-sm">{{ $chirp->created_at->diffForHumans() }}</span>
      </div>

      <p class="mt-1">
        {{ $chirp->message }}
      </p>
    </div>
  </div>
</div>
