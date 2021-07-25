<?php
namespace Tests;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;

trait RequestAdapter
{
    public function validateRequest(array $data, string $className)
    {
        $request = new $className();
        $request->request->add($data);
        $validator = Validator::make($data, $request->rules());
        $errors = $validator->errors()->toArray();
        foreach (array_keys($errors) as $field) {
            $this->assertArrayNotHasKey($field, $errors, ($errors[$field][0] ?: ''));
        }

        $this->assertFalse($validator->fails());
    }
}
