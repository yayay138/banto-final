<div>
  <flux:modal class="dialog !overflow-scroll" name="view-campaign" wire:model.self="showViewCampaignDialog">
  <div class="pt-8">
    <div class="info-section">
      <div class="section-header">Informasi Dasar Penggalangan Dana</div>
      <div class="p-2">
      <flux:label>Judul</flux:label>
        <flux:text>{{ $campaign?->title }}</flux:text>
      </div>
      <div class="p-2">
      <flux:label>Kategori</flux:label>
        <flux:text>{{ $this->category() }}</flux:text>
      </div>
      <div class="p-2">
      <flux:label>Lokasi</flux:label>
        <flux:text>{{ $campaign?->location }}</flux:text>
      </div>
    </div>
    <div class="info-section">
    <div class="section-header">Ceritakan Kisah Anda</div>
      <div class="p-2">
        <flux:label>Deskripsi Penggalangan</flux:label>
        <flux:text>{{ $campaign?->description }}</flux:text>
      </div>      
      <div class="p-2">
        <flux:label>Rencana Pengkinian</flux:label>
        <flux:text>{{ $campaign?->updateplan }}</flux:text>
      </div>
    </div>
    <div class="info-section">
      <div class="-mt-5 ml-4 z-9999 text-2xl px-2 bg-zinc-300 dark:bg-zinc-800 border rounded-md font-bold w-fit">Target Penggalangan Dana</div>
      <div class="p-2">
      <flux:label>Target Pengumpulan Dana</flux:label>
        <flux:text>{{ $campaign?->target }}</flux:text>
      </div>
      <div class="p-2">
      <flux:label>Batas Waktu</flux:label>
        <flux:text>{{ $campaign?->deadline }} ({{$campaign?->dayleft}} hari lagi.)</flux:text>
      </div>
      @if ($campaign?->category === 'EMERGENCY' || $campaign?->category === 'DISASTER')
      <div class="p-2">
      <flux:label>Alamat Penerimaan Barang</flux:label>
      <flux:text>{{ $campaign?->address }}</flux:text>
      </div>
      @endif
    </div>
    @if ( Auth::user()->id === $campaign?->owner )
    <div class="info-section">
      <div class="section-header">Informasi Pencairan Dana</div>
      <div class="p-2">
        <flux:label>Tipe Penerima</flux:label>
        <flux:text>{{ $this->accountType() }}</flux:text>
      </div>
      <div class="p-2">
        <flux:label>Rekening Bank</flux:label>
        <flux:text>{{ $this->accountbank() }}</flux:text>
      </div>
      <div class="p-2">
      <flux:label>Nomor Rekening</flux:label>
      <flux:text>{{ $campaign?->accountno }}</flux:text>
      </div>
      <div class="p-2">
      <flux:label>Pemilik Rekening</flux:label>
      <flux:text>{{ $campaign?->accountholder }}</flux:text>
      </div>
    </div>
    @endif
    <div class="info-section">
      <div class="section-header">Media</div>
      <div class="p-2">
        <flux:label>Foto</flux:label>
        <img src="{{ $campaign?->photo }}" class="rounded-md max-w-80" />
      </div>
      @if ($campaign != null && str_starts_with($campaign->videolink, 'https'))
      <div class="p-2">
        <flux:label>Video</flux:label>
        <x-embed url="{{ $campaign->videolink }}" />
      </div>
      @endif
    </div>
    <div class="mt-6 flex flex-row justify-center">
      <flux:button x-on:click="$wire.showViewCampaignDialog = false">Tutup</flux:button>
    </div>
  </div>
  </flux:modal>
</div>
