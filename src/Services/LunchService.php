<?php
    namespace App\Services;
    use App\Common\BaseService;
class LunchService extends BaseService
{
    protected $filtered = '';
    protected $filterAllowed = [
        'use-by' => 'UseBy',
        'best-before' => 'BestBefore'
    ];
/**Get list of recipes from json file */
    public function getRecipes()
    {
        $contents = file_get_contents(__DIR__ . "/data/recipe_data.json");
        $jsonContent = json_decode($contents, true);
        $jsonContent = $jsonContent['recipes'] ?? [];
        $this->setResult($jsonContent);
        return $this;
    }
/** Get list of ingredients from json file */
    public function getIngredients()
    {
        $contents = file_get_contents(__DIR__ . "/data/ingredient_data.json");
        $jsonContent = json_decode($contents, true);
        $jsonContent = $jsonContent['ingredients'] ?? [];
        $this->setResult($jsonContent);
        return $this;
    }

    public function getResultTitle()
    {
        return array_column($this->result, 'title');
    }

    public function filters(array $args)
    {
        if ($args) {
            foreach ($this->filterAllowed as $key => $val) {
                if (isset($args[$key])) {
                    $this->{'applyFilterBy' . $val}($args[$key]);
                    break;
                }
            }
        }

        return $this;
    }

    public function applyFilterByBestBefore($date)
    {
        $tmpUseBy = $this->applyFilterByUseBy($date);
        $tmpBest = $this->applyFiltered('best-before', $date, $tmpUseBy);
        $diff = array_diff_key($tmpUseBy, $tmpBest);
        $json = array_merge($tmpBest, $diff);
        $this->setResult($json);

        return $json;
    }

    public function applyFilterByUseBy($date)
    {
        $jsonRes = $this->getResult();
        $json = $this->applyFiltered('use-by', $date, $jsonRes);
        $this->setResult($json);
        return $json;
    }

    public function applyFiltered($name, $date, $json = [])
    {
        if (!$json) {
            return $json;
        }

        $resJson = [];
        foreach ($json as $key => $val) {
            if (!$this->excessDate($val[$name], $date)) {
                $resJson[$key] = $val;
            }
        }

        return $resJson;
    }
   

    public function getRecipeByIngredients(array $args)
    {
        $data = [];
        $jsonResult = $this->getResult();
        foreach ($jsonResult as $key => $val) {
            $diff = array_diff($val['ingredients'], $args);
            if (!$diff) {
                $data[] = $val;
            }
        }

        $this->setResult($data);

        return $this;
    }
}
?>