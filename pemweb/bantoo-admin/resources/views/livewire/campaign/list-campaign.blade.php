<div class="mt-6 ml-6">
  <ul>
  @foreach ($campaigns as $campaign)
    <li wire:key="campaign-{{ $campaign['id'] }}">
      <div class="flex flex-row items-between border border-zinc-600 dark:border-zinc-400 rounded-2xl mb-1 justify-between">
        <div class="rounded-xl ml-3 p-2 grow-0">
          <img src="/images/{{ $campaign->photo }}" class="rounded-2xl" width="200px"/>
        </div>
        <div class="grow-1 ml-1.5 p-2 flex flex-col items-stretch">
          <div>{{ $campaign->title }}</div>
          <div>{{ $campaign->description }}</div>
          <div>Target penggalangan {{ $campaign->targetfunding }}</div>
        </div>
        <div class="grow-0 mr-3 p-2 flex flex-col-reverse justify-items-start gap-1 min-w-30">
          @if ($campaign->status === 'PENDING')
          <flux:button wire:click="approve({{ $campaign['id'] }})">Approve</flux:button>
          <flux:button wire:click="reject({{ $campaign['id'] }})">Reject</flux:button>
          @endif
          @if ($campaign->status === 'SUSPEND')
          <flux:button wire:click="continue({{ $campaign['id'] }})">Continue</flux:button>
          <flux:button wire:click="terminate({{ $campaign['id'] }})">Terminate</flux:button>
          @endif
          @if ($campaign->status === 'ACTIVE')
          <flux:button wire:click="terminate({{ $campaign['id'] }})">Terminate</flux:button>
          <flux:button wire:click="complete({{ $campaign['id'] }})">Complete</flux:button>
          <flux:button wire:click="suspend({{ $campaign['id'] }})">Suspend</flux:button>
          @endif
        </div>
      </div>
    </li>
  @endforeach
  </ul>
</div>
