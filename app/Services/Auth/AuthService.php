<?php namespace App\Services\Auth;

use App\Http\Criteria\User\ForAuthTokenAndNotNull;
use App\Library\NewRepositoriesPattern\Abstracts\CriteriaBuilder;
use App\Library\NewRepositoriesPattern\Abstracts\Service;
use App\Repositories\User\UserRepository;
use Illuminate\Database\DatabaseManager;

/**
 * Class AuthService
 *
 * @package App\Services\Auth
 */
class AuthService extends Service {

    public $authService;

    /**
     * AuthService Constructor
     *
     * @param UserRepository $repository
     * @param DatabaseManager $db
     */
    public function __construct(UserRepository $repository, DatabaseManager $db) {
        parent::__construct($repository, $db);
    }

    /**
     * User for id
     *
     * @param $id
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function get($id, $with = []) {

        // get builder
        $builder = (new CriteriaBuilder($this, $with));

        // return first instance
        return $this->Repository->get($builder, $id);
    }

    /**
     * For Token
     *
     * @param $authToken
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getByAuthToken($authToken, array $with = []) {
        // prepare builder
        $builder = new CriteriaBuilder($this, $with);

        // filter
        $builder->add(new ForAuthTokenAndNotNull($authToken));

        // fetch first
        return $this->Repository->first($builder);
    }

    /**
     * Add auth filters
     *
     * @param CriteriaBuilder $builder
     */
    public function addBasicFilters(CriteriaBuilder $builder) {
    }
}