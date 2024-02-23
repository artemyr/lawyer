<?php

namespace App\Services\DynamicUrl\Helpers;

use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Controllers\CategoryController;
use App\Services\DynamicUrl\Controllers\CityController;
use App\Services\DynamicUrl\Controllers\DefaultController;
use App\Services\DynamicUrl\Controllers\GosInstansController;
use App\Services\DynamicUrl\Controllers\GosInstansDetailController;
use Exception;

class DynamicUrlHelper extends DynamicUrlHelperAbstract
{
    /**
     * @throws Exception
     */
    public function getHandlerClass(): DynamicUrlControllerInterface
    {
        switch (count($this->slags)) {
            case 1:
                /**
                 * 1 слаг - либо город | категория
                 */
                if (in_array($this->slags[0], $this->getCities())) {
                    $this->citySlug = $this->slags[0];
                    return new CityController;
                } else {
                    if (in_array($this->slags[0], $this->getCategories())) {
                        $this->categorySlug = $this->slags[0];
                        return new CategoryController;
                    }
                }
                break;
            case 2:
                /**
                 * 2 слага - категория города | гос инстанции
                 */
                if (in_array($this->slags[0], $this->getCities())) {
                    $this->citySlug = $this->slags[0];
                    if (in_array($this->slags[1], $this->getCategories())) {
                        $this->categorySlug = $this->slags[1];
                        return new CategoryController;
                    }
                } elseif (in_array($this->slags[0], $this->getCategories())) {
                    $this->categorySlug = $this->slags[0];
                    if ($this->slags[1] === 'instation') {
                        return new GosInstansController();
                    }
                }
                break;
            case 3:
                /**
                 * 3 слага - гос инстанция детальная
                 */
                if (in_array($this->slags[0], $this->getCategories())) {
                    $this->categorySlug = $this->slags[0];
                    if ($this->slags[1] === 'instation') {
                        if (in_array($this->slags[2], $this->getGosInstanses())) {
                            $this->gosInstans = $this->slags[2];
                            return new GosInstansDetailController();
                        }
                    }
                }
                break;
            default:
                throw new Exception("обработчик не найден");
        }
        return new DefaultController;
    }
}
