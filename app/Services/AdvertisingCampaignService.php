<?php

namespace App\Services;

use App\Http\Requests\Api\AdvertisingCampaignRequest;
use App\Models\AdvertisingCampaign;

/**
 * Service for advertising campaign.
 */
class AdvertisingCampaignService
{
    /**
     * Create advertising campaign.
     *
     * @param AdvertisingCampaignRequest $request
     *
     * @return bool
     *
     * @throws \Throwable
     */
    public function create(AdvertisingCampaignRequest $request): bool
    {
        $advertisingCampaign = new AdvertisingCampaign();
        $advertisingCampaign->fill($request->only(['title', 'price', 'display_frequency']));

        return \DB::transaction(function () use ($advertisingCampaign, $request) {
            if ($advertisingCampaign->save()) {
                $advertisingCampaign->countries()->attach($request->get('country_ids'));
                $advertisingCampaign->browsers()->attach($request->get('browser_ids'));

                return true;
            }

            return false;
        });
    }

    /**
     * Update advertising campaign.
     *
     * @param AdvertisingCampaignRequest $request
     * @param AdvertisingCampaign $advertisingCampaign
     *
     * @return bool
     *
     * @throws \Throwable
     */
    public function update(AdvertisingCampaignRequest $request, AdvertisingCampaign $advertisingCampaign): bool
    {
        $advertisingCampaign->fill($request->only(['title', 'price', 'display_frequency']));

        return \DB::transaction(function () use ($advertisingCampaign, $request) {
            if ($advertisingCampaign->save()) {
                $advertisingCampaign->countries()->sync($request->get('country_ids'));
                $advertisingCampaign->browsers()->sync($request->get('browser_ids'));

                return true;
            }

            return false;
        });
    }

    /**
     * Destroy advertising campaign.
     *
     * @param AdvertisingCampaign $advertisingCampaign
     *
     * @return bool
     *
     * @throws \Throwable
     */
    public function destroy(AdvertisingCampaign $advertisingCampaign): bool
    {
        return $advertisingCampaign->delete();
    }
}
