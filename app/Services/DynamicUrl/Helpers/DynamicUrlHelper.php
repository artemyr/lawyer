<?php

namespace App\Services\DynamicUrl\Helpers;

use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Controllers\CategoryController;
use App\Services\DynamicUrl\Controllers\CityController;
use App\Services\DynamicUrl\Controllers\DefaultController;
use App\Services\DynamicUrl\Controllers\GosInstationTypeController;
use App\Services\DynamicUrl\Controllers\GosInstationDetailController;
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
                if ($this->isCity($this->slags[0])) {
                    $this->citySlug = $this->slags[0];
                    return new CityController;
                } else {
                    if ($this->isCategory($this->slags[0])) {
                        $this->categorySlug = $this->slags[0];
                        return new CategoryController;
                    }
                }
                break;
            case 2:
                /**
                 * 2 слага - категория города | гос инстанции
                 */
                if ($this->isCity($this->slags[0])) {
                    $this->citySlug = $this->slags[0];
                    if ($this->isCategory($this->slags[1])) {
                        $this->categorySlug = $this->slags[1];
                        return new CategoryController;
                    }
                } elseif ($this->isCategory($this->slags[0])) {
                    $this->categorySlug = $this->slags[0];
                    if ($this->slags[1] === static::INSTATIONS_SLUG) {
                        return new GosInstationTypeController();
                    }
                }
                break;
            case 3:
                /**
                 * 3 слага - тип инстанции
                 */
                if ($this->isCity($this->slags[0])) {
                    $this->citySlug = $this->slags[0];
                    if ($this->slags[1] === static::INSTATIONS_SLUG) {
                        if ($this->isGosInstanseType($this->slags[2])) {
                            $this->gosInstansTypeSlug = $this->slags[2];
                            return new GosInstationTypeController();
                        }
                    }
                }
                break;
            case 4:
                /**
                 * 4 слага - гос инстанция детальная
                 */
                if ($this->isCity($this->slags[0])) {
                    $this->citySlug = $this->slags[0];
                    if ($this->slags[1] === static::INSTATIONS_SLUG) {
                        if ($this->isGosInstanseType($this->slags[2])) {
                            $this->gosInstansTypeSlug = $this->slags[2];
                            if ($this->isGosInstance($this->slags[3])) {
                                $this->gosInstance = $this->slags[3];
                                return new GosInstationDetailController();
                            }
                        }
                    }
                }
                echo'';
                break;
            default:
                throw new Exception("обработчик не найден");
        }
        return new DefaultController;
    }
}
