<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DniDocument;

class DniDocumentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dni_document()
    {
        $dniDocument = DniDocument::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dni_documents', $dniDocument
        );

        $this->assertApiResponse($dniDocument);
    }

    /**
     * @test
     */
    public function test_read_dni_document()
    {
        $dniDocument = DniDocument::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dni_documents/'.$dniDocument->id
        );

        $this->assertApiResponse($dniDocument->toArray());
    }

    /**
     * @test
     */
    public function test_update_dni_document()
    {
        $dniDocument = DniDocument::factory()->create();
        $editedDniDocument = DniDocument::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dni_documents/'.$dniDocument->id,
            $editedDniDocument
        );

        $this->assertApiResponse($editedDniDocument);
    }

    /**
     * @test
     */
    public function test_delete_dni_document()
    {
        $dniDocument = DniDocument::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dni_documents/'.$dniDocument->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dni_documents/'.$dniDocument->id
        );

        $this->response->assertStatus(404);
    }
}
