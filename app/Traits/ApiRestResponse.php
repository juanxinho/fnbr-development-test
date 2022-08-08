<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Throwable;
use Illuminate\Http\Response;

trait ApiRestResponse
{
	/**
	 * success
	 *
	 * @param  mixed $data
	 * @param  mixed $code
	 * @return mixed
	 */
	public function success($data = [], $code = Response::HTTP_OK): mixed {
		return response()->json($data, $code);
	}

	/**
	 * response
	 *
	 * @param mixed $data
	 * @param mixed $code
	 *
	 * @return Illuminate\Http\Response
	 */
	public function response($data, $code = Response::HTTP_OK) {
		return response()->json(['data' => ($data) ? $data : []], $code);
	}

  /**
	 * error
	 *
	 * @param  mixed $path
	 * @param  mixed $exception
	 * @param  mixed $message
	 * @param  mixed $code
	 * @return void
	 */
	public function error ($path, Throwable $exception, $message, $code) {
		return response()->json([
			'timestamps' => date('Y-m-d H:i:s'),
			'path' => $path,
			'exception' =>  basename(str_replace('\\', '/', get_class($exception))),
			'errors' => $this->checkIsArray($message),
			'code' => $code
		], $code);
	}

	/**
	 * checkIsArray
	 *
	 * @param  mixed $message
	 * @return void
	 */
	private function checkIsArray($message) {
		$messageArray = [];
		if (!is_array($message)) {
			array_push($messageArray, $message);
			$message = $messageArray;
		}

		return collect($message)->unique()->values()->all();
	}
}
