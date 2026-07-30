<?php

namespace App\Service;

class FilterService
{
    public function __construct(
        protected array $filter
    ) {
    }

    public function getSearchedQuery(): ?string
    {
        return $this->getFilterQuery('searched', 'product', 'name', 'LIKE');
    }

    public function getCategoryQuery(): ?string
    {
        return $this->getFilterQuery('category', 'product', 'category');
    }

    public function getMinQuery(): ?string
    {
        return $this->getFilterQuery('min', 'product', 'price', '>=');
    }

    public function getMaxQuery(): ?string
    {
        return $this->getFilterQuery('max', 'product', 'price', '<=');
    }

    public function getStarQuery(): ?string
    {
        return $this->getFilterQuery('star', 'product', 'star_average');
    }

    public function getCityQuery(): ?string
    {
        return $this->getFilterQuery('city', 'user', 'city');
    }

    public function getUserQuery(): ?string
    {
        return $this->getFilterQuery('user', 'product', 'user');
    }

    public function getFilterQuery($key, $table, $name, $query = ' = '): ?string
    {
        if (isset($this->filter[$key])) {
            $databaseQuery = null;
            $i = 0;

            $max = count($this->filter[$key]);

            foreach ($this->filter[$key] as $filterItem) {
                ++$i;

                if ('searched' === $key) {
                    $filterItem = "'%$filterItem%'";
                }

                if ('city' === $key) {
                    $filterItem = "'$filterItem'";
                }

                if ('min' === $key && '' == $filterItem) {
                    $filterItem = 0;
                }

                if ('max' === $key && '' == $filterItem) {
                    $filterItem = 10000;
                }

                if ($i === $max) {
                    $or = null;
                } else {
                    $or = ' || ';
                }

                $databaseQuery = "$databaseQuery $table.$name $query $filterItem $or";
            }

            return "($databaseQuery)";
        }

        return null;
    }

    public function getAllQueries($exception = null): ?string
    {
        $filter = [];
        $i = 0;
        foreach (array_keys($this->filter) as $key) {
            $methodName = 'get'.$key.'Query';
            if ($key !== $exception) {
                if (method_exists($this, $methodName)) {
                    $filter[$i] = $this->$methodName();
                }
            }
            ++$i;
        }

        if (empty($filter)) {
            return null;
        }

        $newQuery = null;
        $i = 0;
        $max = count($filter);
        foreach ($filter as $filterItem) {
            ++$i;
            if (isset($filterItem) and '' !== $filterItem and $i !== $max) {
                $and = ' && ';
            } else {
                $and = null;
            }

            $newQuery = $newQuery.$filterItem.$and;
        }

        return 'WHERE '.$newQuery;
    }

    public function gettingOrderByQuery(): string
    {
        if (isset($this->filter['orderBy'][0])) {
            if ('asc' == $this->filter['orderBy'][0]) {
                $orderBy = 'product.price ASC, ';
            } else {
                $orderBy = 'product.price DESC, ';
            }
        } else {
            $orderBy = null;
        }

        return ' ORDER BY '.$orderBy.' product.created_at DESC';
    }
}
