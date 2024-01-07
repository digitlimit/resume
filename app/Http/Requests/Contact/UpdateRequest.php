<?php
declare(strict_types=1);
namespace App\Http\Requests\Contact;

use App\Traits\FormRequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    use FormRequestTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //TODO use more strict validator for address
            'address_1' => 'nullable|string',
            'address_2' => 'nullable|string',

            'phone_number' => 'nullable|numeric',
            'mobile_number' => 'nullable|numeric',

            'email' => 'nullable|email',
        ];
    }
}
