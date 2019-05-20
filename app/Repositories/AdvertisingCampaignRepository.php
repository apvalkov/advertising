<?php

namespace App\Repositories;

use App\Models\AdvertisingCampaign;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
     * @param AdvertisingCampaign $model
     */
    public function __construct(AdvertisingCampaign $model)
    {
        $this->model = $model;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function find(): ?LengthAwarePaginator
    {
        return $this->model::paginate(self::PAGE_SIZE);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findOne(int $id)
    {
        return $this->model::findOrFail($id);
    }
}
