<?php


namespace App\Http\Controllers;


use App\Entities\Category;
use App\Services\CategoryService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryService->findAllCategories((int) $request->get('page', 1));

        return responder()->success($categories)->respond();
    }

    public function show(int $id)
    {
        $category = $this->categoryService->findCategory($id);

        return responder()->success($category)->respond();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function store(Request $request)
    {
        $description = $request->get('description');

        $category = new Category($description);

        return responder()->success($this->categoryService->saveCategory($category))->respond();
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function update(Request $request, int $id)
    {
        $category = $this->categoryService->findCategory($id);

        $description = $request->get('description', $category->getDescription());

        $category->setDescription($description);

        return responder()->success($this->categoryService->saveCategory($category))->respond();
    }

    /**
     * @param int $id
     * @return JsonResponse
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function destroy(int $id)
    {
        $category = $this->categoryService->findCategory($id);

        return responder()->success($this->categoryService->removeCategory($category))->respond();
    }
}
