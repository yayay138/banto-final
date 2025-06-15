<?php

namespace App\Livewire\Campaign;

use Livewire\Component;
use Livewire\Attributes\On;

class ViewCampaign extends Component
{
  public $campaign;

  public $showViewCampaignDialog = false;

  #[On('view-detail-campaign')]
  public function viewCampaign($campaign) {
    $this->campaign = (object)$campaign;
    $this->showViewCampaignDialog = true;
  }

  public function render()
  {
    return view('livewire.campaign.view-campaign');
  }

  public function category()
  {
    return match($this->campaign?->category) {
      'HEALTH'     => 'Kesehatan',
      'EDUCATION'  => 'Pendidikan',
      'EMERGENCY'  => 'Darurat',
      'DISASTER'   => 'Bencana',
      'PETS'       => 'Hewan Peliharaan',
      'CREATIVITY' => 'Ide Kreatif',
      default => 'Lain-Lain'
    };
  }

  public function accountType()
  {
    return match($this->campaign?->accounttype) {
      'PERSONAL'     => 'Individu',
      'ORGANIZATION' => 'Organisasi',
      default => 'Lain-Lain'
    };
  }

  public function accountbank()
  {
    return match($this->campaign?->accountbank) {
      'MANDIRI' => 'Bank Mandiri',
      'BRI'     => 'Bank BRI',
      'BNI'     => 'Bank BRI',
      'BCA'     => 'Bank BCA',
      'CIMB'    => 'Bank CIMB Niaga',
      default   => 'Lain-Lain'
    };
  }
}