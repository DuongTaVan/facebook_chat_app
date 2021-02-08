<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['shopify_domain', 'status', 'theme_color', 'logged_in_greeting', 'logged_out_greeting', 'greeting_dialog_display', 'locator', 'greeting_dialog_delay','locator_top'];
}
