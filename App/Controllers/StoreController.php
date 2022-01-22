<?php /** @noinspection PhpUndefinedConstantInspection */

namespace App\controllers;

use App\models\PartsCategories;
use App\models\PartsStorage;
use Symfony\Component\HttpFoundation\Request;

class StoreController extends \Core\Controller
{
    /**
     * @return string
     */
    public function main(){
        $parts = PartsStorage::where('parts-quantity' , '<=', 10)->get();
        return $this->view('store.store', ['parts' => $parts]);
    }

    /**
     * @return string
     */
    public function newStoreCategory(){
        return $this->view('store.new-store-category');
    }

    /**
     * @return string
     */
    public function newCarPart(){
        return $this->view('store.new-car-part');
    }

    /**
     * @return string
     */
    public function editCarPart(){

        $partList = PartsStorage::all();


        return $this->view('store.edit-car-part', ['partList' => $partList]);

    }

    /**
     * @param Request $request
     * @return string|void
     */
    public function UpdateEditCarPart(Request $request){
        if ($request->isMethod("POST")){
            $partList = PartsStorage::all();

            $message = "";
            $updatedContinue = false;

            $this->validator->rule('required', ['parts-name-edit', 'parts-code-edit', 'parts-category-edit', 'parts-price-edit', 'parts-stock-edit']);
            $this->validator->rule('integer', ['parts-price', 'part-stock']);
            $this->validator->labels([
                'parts-name-edit' => 'Parça Adı',
                'parts-code-edit' => 'Parça Kodu',
                'parts-category-edit' => 'Parça Kategorisi',
                'parts-price-edit' => 'Parça Fiyatı',
                'part-stock-edit' => 'Parça Stok'
            ]);
            if ($this->validator->validate()){

                $part = PartsStorage::where('id', '=', $request->get('parts-id-edit'))->first();
                if ($part){
                    $updatedContinue = true;
                }

                if ($updatedContinue){
                    $update = PartsStorage::where('id', '=', $request->get('parts-id-edit'))->update([
                        'parts-name' => $request->get('parts-name-edit'),
                        'parts-code' => $request->get('parts-code-edit'),
                        'parts-category' => $request->get('parts-category-edit'),
                        'parts-price' => $request->get('parts-price-edit'),
                        'parts-quantity' => $request->get('parts-stock-edit')
                    ]);
                    $update ? $message = "Güncellendi" : '';
                }
            }
            return $this->view('store.edit-car-part', ['partList' => $partList, 'message' => $message, 'processOk' => 1]);
        }
    }

    /**
     * @param Request $request
     * @return string|void
     */
    public function CreateStoreCategory(Request $request)
    {
        if ($request->isMethod('POST')){
            $isCreatedCategory = false;
            $this->validator->rule('required', ["category-name", "parent-category"]);
            $this->validator->labels([
                "category-name" => "Kategori Adı",
                "parent-category" => "Üst Kategori"
            ]);

            if ($this->validator->validate()){
                $createParts = '';
                $createParts = PartsCategories::create([
                    "category-name" => $this->validator->data()["category-name"],
                    "parent-category" => $this->validator->data()["parent-category"]
                ]);
                $createParts ? $isCreatedCategory = true : '';
            }
            return $this->view('store.new-store-category', ["isCreatedCategory" => $isCreatedCategory]);
        }
    }


    public static function getCategory(){

        $partsCategories = PartsCategories::where('parent-category', '=', 0)->get();

        foreach ($partsCategories as $category){
            if($category->childs->count()>0 ) {
                echo '<option value="' . $category->id . '">' . $category["category-name"] . '</option>';
                foreach ($category->childs as $subCategory){
                    echo '<option value="' . $subCategory->id . '"> --> ' . $subCategory["category-name"] . '</option>';
                }
            }else{
                echo '<option value="' . $category->id . '">' . $category["category-name"] . '</option>';

            }
        }
    }

    /**
     * @param $id
     * @return false|string|void
     */
    public function GetCategoryInfo($id){
            if (is_numeric($id)){
                $response = '';
                $categories = PartsCategories::where('id', '=', $id)->first();
                $parentCategoryName = PartsCategories::where('id', '=', $categories["parent-category"])->select('category-name')->first();
                $response = [
                    "id" => $categories["id"],
                    "category-name" => $categories["category-name"],
                    "parent-category" => $categories["parent-category"],
                    "parent-category-name" => $parentCategoryName
                ];
                $response_json = json_encode($response);

                return $response_json;
            }
    }

    /**
     * @param Request $request
     * @return string|void
     */
    public function editStoreCategory(Request $request){
        if ($request->isMethod('POST')){
            $isUpdatedCategory = false;
            $this->validator->rule('required', ["category-name-edit", "category-id-edit", "parent-category-edit"]);
            $this->validator->labels([
                "category-name" => "Kategori Adı",
                "parent-category" => "Üst Kategori"
            ]);

            if ($this->validator->validate()){
                $updateParts = PartsCategories::where('id', '=', $this->validator->data()["category-id-edit"])
                                ->update([
                                "category-name" => $this->validator->data()["category-name-edit"],
                                "parent-category" => $this->validator->data()["parent-category-edit"]
                            ]);
                $updateParts ? $isUpdatedCategory = true : '';
            }
            return $this->view('store.new-store-category', ["processOk" => $isUpdatedCategory, 'message' =>"Kategori Güncellendi"]);
        }
    }

    /**
     * @param $id
     * @return string|void
     */
    public function deleteCategory($id){

        if (!is_numeric($id)){
            return $this->view('store.new-store-category', ["processOk" => 1, 'message' =>"Geçersiz Talep"]);
        }

        $categpory = PartsCategories::where('id', '=', $id)->first();
        if (!$categpory){
            return $this->view('store.new-store-category', ["processOk" => 1, 'message' =>"Kategori Yok"]);
        }else{
            $deleting = PartsCategories::where('id', '=', $id)->delete();
            if ($deleting){
                return $this->view('store.new-store-category', ["processOk" => 1, 'message' =>"Kategori Silindi"]);
            }
        }
    }

    /**
     * @param Request $request
     * @return string|void
     */
    public function CarPartCreate(Request $request){
        if ($request->isMethod('POST')){
            $message = "";
            $createContinue = true;

            $this->validator->rule('required', ['parts-name', 'parts-code', 'parts-category', 'parts-price', 'parts-stock']);
            $this->validator->rule('integer', ['parts-price', 'part-stock']);
            $this->validator->labels([
                'parts-name' => 'Parça Adı',
                'parts-code' => 'Parça Kodu',
                'parts-category' => 'Parça Kategorisi',
                'parts-price' => 'Parça Fiyatı',
                'parts-stock' => 'Parça Stok'
            ]);

            if ($this->validator->validate()){
                $isParts = $this->CheckPartCode($request->get('parts-code'));

                if (!is_null($isParts)){
                    $this->validator->error('parts-code', 'Aynı koda sahip Parça Kayıtlı');
                    $createContinue = false;
                }

                if ($createContinue){
                    $create = PartsStorage::create([
                        'parts-name' => $request->get('parts-name'),
                        'parts-code' => $request->get('parts-code'),
                        'parts-category' => $request->get('parts-category'),
                        'parts-price' => $request->get('parts-price'),
                        'parts-quantity' => $request->get('parts-stock')
                    ]);
                    $create ? $message = "Kayıt Edildi" : '';
                }
            }
            return $this->view('store.new-car-part' , ['processOk' => 1, 'message' => $message]);
        }
    }

    /**
     * @param $partsCode
     * @return mixed
     */
    private function CheckPartCode($partsCode){
        return PartsStorage::where('parts-code', '=', $partsCode)->first();

    }

    /**
     * @param $partCode
     * @return false|string
     */
    public function  GetCarPartInfo($partCode){
        $parts = PartsStorage::orWhere('parts-code', '=', $partCode)->orWhere('id', '=', $partCode)->first();

        if ($parts){
            $categoryName = PartsCategories::where('id', '=', $parts["parts-category"])->select('category-name')->first();

            $response = [
                'part' => $parts,
                'categoryName' => $categoryName,
                'error' => "none",
            ];
            $response_json = json_encode($response);
            return $response_json;

        }else{
            $response = [
                'error' => "Kayıtlı Parça Bulunamadı"
            ];
            $response_json = json_encode($response);
            return $response_json;
        }
    }
}