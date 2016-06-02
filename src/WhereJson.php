<?php namespace Sukohi\WhereJson;

trait WhereJsonTrait {

	public function scopeWhereJson($query, $column, $values, $boolean = 'and') {

		$json_value = json_encode($values);
		$json_values = explode(',', preg_replace('|^[\[\{](.*)[\]\}]$|', '\1', $json_value));

		return $query->where(function($json_query) use($column, $json_values) {

			foreach ($json_values as $json_value) {

				$json_query->orWhere(function($json_value_query) use($column, $json_value) {

					$json_value = str_replace('\\', '\\\\', $json_value);
					$json_value_query->orWhere($column, 'LIKE', '['. $json_value .']')
						->orWhere($column, 'LIKE', '{'. $json_value .'}')
						->orWhere($column, 'LIKE', '['. $json_value .',%')
						->orWhere($column, 'LIKE', '{'. $json_value .',%')
						->orWhere($column, 'LIKE', '%,'. $json_value .',%')
						->orWhere($column, 'LIKE', '%,'. $json_value .']')
						->orWhere($column, 'LIKE', '%,'. $json_value .'}');

				});

			}

		}, $boolean);

	}

	public function scopeOrWhereJson($query, $column, $values) {

		return $this->scopeWhereJson($query, $column, $values, 'or');

	}

}