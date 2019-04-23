<?php

namespace App\Http;

use Illuminate\Http\Response as ResponseConstants;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Response;

class RestResponse {

    /**
     * Handle errors and return Bad Requests
     *
     * @param $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public static function badRequest($errors) {
        return Response::json(
            ['success' => false, 'errors' => $errors],
            ResponseConstants::HTTP_BAD_REQUEST
        );
    }

    /**
     * Success response
     * Also prepare total details for pagination
     *
     * @param $root
     * @param $data
     * @return mixed
     */
    public static function done($root, $data) {
        if ($data instanceof LengthAwarePaginator) {
            return Response::json([
                "success" => true,
                "$root" => $data->toArray()['data'],
                "total" => $data->total()
            ]);
        } else if (!isset($root)) {
            if (is_array($data))
                $data["success"] = true;
            return Response::json($data);
        }
        return Response::json([
            "success" => true,
            $root => $data
        ]);
    }

    /**
     * No content response
     *
     * @return mixed
     */
    public static function noContent() {
        return Response::json([], ResponseConstants::HTTP_NO_CONTENT);
    }

    /**
     * No route found response
     *
     * @return mixed
     */
    public static function notFound() {
        return Response::json([], ResponseConstants::HTTP_NOT_FOUND);
    }

    /**
     * No route found response
     *
     * @return mixed
     */
    public static function serverError() {
        return Response::json(['success' => false, 'errors' => ["message" => "Request failed"]],
            ResponseConstants::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * No Permission Response
     *
     * @return mixed
     */
    public static function noPermission() {
        return Response::json(array("error" => "Permission denied"), ResponseConstants::HTTP_FORBIDDEN);
    }
}