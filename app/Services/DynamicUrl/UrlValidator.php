<?php

namespace App\Services\DynamicUrl;

use App\Http\Controllers\DynamicUrl\CategoryController;
use App\Http\Controllers\DynamicUrl\CityController;
use App\Http\Controllers\DynamicUrl\DefaultController;
use App\Http\Controllers\DynamicUrl\DynamicUrlInterface;
use App\Http\Controllers\DynamicUrl\GosInstansController;
use App\Http\Controllers\DynamicUrl\GosInstansDetailController;

class UrlValidator extends UrlValidatorAbstract
{
    public function validate() : DynamicUrlInterface
    {
        switch (count($this->parts)) {
            case 1:
                /**
                 * 1 слаг - либо город | категория
                 */
                if (in_array($this->page, $this->getCities())) {
                    $this->city = $this->page;
                    return new CityController;
                } else {
                    if (in_array($this->page, $this->getCategories())) {
                        $this->category = $this->page;
                        return new CategoryController;
                    }
                }
                break;
            case 2:
                /**
                 * 2 слага - категория города | гос инстанции
                 */
                if (in_array($this->parts[0], $this->getCities())) {
                    $this->city = $this->parts[0];
                    if (in_array($this->parts[1], $this->getCategories())) {
                        $this->category = $this->parts[1];
                        return new CategoryController;
                    }
                } elseif (in_array($this->parts[0], $this->getCategories())) {
                    $this->category = $this->parts[0];
                    if ($this->parts[1] === 'instation') {
                        return new GosInstansController();
                    }
                }
                break;
            case 3:
                /**
                 * 3 слага - гос инстанция детальная
                 */
                if (in_array($this->parts[0], $this->getCategories())) {
                    $this->category = $this->parts[0];
                    if ($this->parts[1] === 'instation') {
                        if (in_array($this->parts[2], $this->getGosInstanses())) {
                            $this->gosInstans = $this->parts[2];
                            return new GosInstansDetailController();
                        }
                    }
                }
                break;
            default:
                throw new \Exception("обработчик не найден");
        }
        return new DefaultController;
    }
}
