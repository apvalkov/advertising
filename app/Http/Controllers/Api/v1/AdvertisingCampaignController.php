<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\AdvertisingCampaignRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisingCampaignResource;
use App\Repositories\AdvertisingCampaignRepository;
use App\Services\AdvertisingCampaignService;
use Illuminate\Http\Response;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class AdvertisingCampaignController
 * @package App\Http\Controllers\Api\v1
 */
class AdvertisingCampaignController extends Controller
{
    /**
     * @var AdvertisingCampaignService
     */
    private $service;

    /**
     * @var AdvertisingCampaignRepository
     */
    private $repository;

    /**
     * AdvertisingCampaignController constructor.
     *
     * @param AdvertisingCampaignService $service
     * @param AdvertisingCampaignRepository $repository
     */
    public function __construct(AdvertisingCampaignService $service, AdvertisingCampaignRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AdvertisingCampaignResource::collection($this->repository->find());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdvertisingCampaignRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AdvertisingCampaignRequest $request)
    {
        try {
            $this->service->create($request);

            return response()->json([], Response::HTTP_CREATED);
        } catch (\Throwable $e) {
            return \response()->json(['error' => 'server error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return AdvertisingCampaignResource|\Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            return new AdvertisingCampaignResource($this->repository->findOne($id));
        } catch (ModelNotFoundException $e) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        } catch (\Throwable $e) {
            return \response()->json(['error' => 'server error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     *  Update the specified resource in storage.
     *
     * @param AdvertisingCampaignRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AdvertisingCampaignRequest $request, $id)
    {
        try {
            $advertisingCampaign = $this->repository->findOne($id);
            $this->service->update($request, $advertisingCampaign);

            return response()->json([], Response::HTTP_OK);
        } catch (\Throwable $e) {
            return \response()->json(['error' => 'server error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $advertisingCampaign = $this->repository->findOne($id);
            $this->service->destroy($advertisingCampaign);

            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (\Throwable $e) {
            return \response()->json(['error' => 'server error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
