<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{

    public function getAdminLogoAttribute()
    {
        return $this->dashboard_logo ? asset("storage/$this->dashboard_logo") : asset('admin-panel/images/dummy_logo.svg');
    }
    
    public function getSiteLogoAttribute()
    {
        return $this->public_site_logo ? asset("storage/$this->public_site_logo") : asset('admin-panel/images/dummy_logo.svg');
    }
}