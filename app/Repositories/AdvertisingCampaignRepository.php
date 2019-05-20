<?php

namespace App\Repositories;

use App\Models\AdvertisingCampaign;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class AdvertisingCampaignRepository
 * @package App\Repositories
 */
class AdvertisingCampaignRepository
{
    /**
     * Count record on page.
     */
    private const PAGE_SIZE  = 20;

    /**
     * @var AdvertisingCampaign
     */
    private $model;

    /**
     * AdvertisingCampaignRepository constructor.
     *
     * @param AdvertisingCampaign $model
     */
    public function __construct(AdvertisingCampaign $model)
    {
        $this->model = $model;
    }

    /**
     * Find many Advertising campaign.
     *
     * @return LengthAwarePaginator
     */
    public function find(): ?LengthAwarePaginator
    {
        return $this->model::paginate(self::PAGE_SIZE);
    }

    /**
     * Find one Advertising campaign.
     *
     * @param int $id
     *
     * @return mixed
     *
     * @throws ModelNotFoundException
     */
    public function findOne(int $id): AdvertisingCampaign
    {
        return $this->model::findOrFail($id);
    }
}
