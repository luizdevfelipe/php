<?php 
declare(strict_types=1);

namespace Tests\Unit;

use app\Exceptions\RouteNotFoundException;
use PHPUnit\Framework\TestCase;
use \App\Router;

class RouterTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        parent::setUp();

        $this->router = new Router();

    }

    /** @test */
    public function it_registers_a_route()
    {
        
        //When we call a register method
        $this->router->register('get', '/users', ['Users', 'index']);

        $expected = [
            'get'=>[
                '/users'=>['Users', 'index']
            ]
        ];

        //Then we assert route was registered
        $this->assertEquals($expected, $this->router->routes());
    }

    /** @test */
    public function it_registers_a_get_router()
    {       
        $this->router->get('/users', ['Users', 'index']);

        $expected = [
            'GET'=>[
                '/users'=>['Users', 'index']
            ]
        ];

        
        $this->assertEquals($expected, $this->router->routes());
    }

    /** @test */
    public function it_registers_a_post_router()
    {
        //quando um método post para registro é chamado
        $this->router->post('/users', ['Users', 'store']);

        $expected = [
            'POST'=>[
                '/users'=>['Users', 'store']
            ]
        ];

        //então afirmamos que ela foi registrada
        $this->assertEquals($expected, $this->router->routes());
    }

    /** @test */
    public function there_are_no_routes_when_route_is_created()
    {
        $this->assertEmpty((new Router())->routes());
    }

    /** @test 
     * @dataProvider \Tests\DataProviders\RouterDataProvider::routeNotFoundCases
    */
    public function it_throws_route_not_found_exeption(string $requestUri, string $requestMethod)
    {
        $users = new class (){
            public function delete(){
                return true;
            }
        };

        $this->router->post('/users', [$users::class, 'storage']);
        $this->router->get('/users', ['Users', 'index']);

        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri, $requestMethod);
    }

    /** @test */
    public function it_resolves_route_from_a_closure()
    {
        $this->router->get('/users', fn()=> [1,2,3]);

        $this->assertEquals([1,2,3], $this->router->resolve('/users', 'GET'));
    }

    public function test_it_resolves_route()
    {
        $users = new class (){
            public function index():array{
                return ['1',2,3];
            }
        };

        $this->router->get('/users', [$users::class, 'index']);

        $this->assertSame([1,2,3], $this->router->resolve('/users', 'GET'));
    }
}
