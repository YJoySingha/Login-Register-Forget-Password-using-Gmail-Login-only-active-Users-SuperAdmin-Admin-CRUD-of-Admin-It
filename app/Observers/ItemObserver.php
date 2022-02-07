<?php

namespace App\Observers;

use App\Items;

class ItemObserver
{
    /**
     * Handle the items "created" event.
     *
     * @param  \App\Items  $items
     * @return void
     */
    public function created(Items $items)
    {
        
        $items->itemUniqueId = 'SPK-Item-'.$items->id;
        
        $items->save();
    }

    /**
     * Handle the items "updated" event.
     *
     * @param  \App\Items  $items
     * @return void
     */
    public function updated(Items $items)
    {
        //
    }

    /**
     * Handle the items "deleted" event.
     *
     * @param  \App\Items  $items
     * @return void
     */
    public function deleted(Items $items)
    {
        //
    }

    /**
     * Handle the items "restored" event.
     *
     * @param  \App\Items  $items
     * @return void
     */
    public function restored(Items $items)
    {
        //
    }

    /**
     * Handle the items "force deleted" event.
     *
     * @param  \App\Items  $items
     * @return void
     */
    public function forceDeleted(Items $items)
    {
        //
    }
}
