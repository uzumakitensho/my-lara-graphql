<?php

namespace App\GraphQl\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * 
 */
class UserType extends GraphQLType
{
	protected $attributes = [
		'name'        => 'User',
		'description' => 'An user.',
		'model'       => User::class,
	];

	public function fields(): array
	{
		return [
			'id'            => [
				'type'        => Type::nonNull(Type::int()),
				'description' => 'The id of the user',
			],
			'email'         => [
				'type'        => Type::string(),
				'description' => 'The email of the user',
			],
			'name'          => [
				'type'        => Type::string(),
				'description' => 'The name of the user',
			],
			'user_profiles' => [
				'type'        => GraphQL::type('user_profiles'),
				'description' => 'The profile of the user',
			],
		];
	}

	protected resolveEmailField($root, $args)
	{
		return strtolower($root->email);
	}
}