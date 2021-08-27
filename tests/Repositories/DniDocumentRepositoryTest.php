<?php namespace Tests\Repositories;

use App\Models\DniDocument;
use App\Repositories\DniDocumentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DniDocumentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DniDocumentRepository
     */
    protected $dniDocumentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dniDocumentRepo = \App::make(DniDocumentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dni_document()
    {
        $dniDocument = DniDocument::factory()->make()->toArray();

        $createdDniDocument = $this->dniDocumentRepo->create($dniDocument);

        $createdDniDocument = $createdDniDocument->toArray();
        $this->assertArrayHasKey('id', $createdDniDocument);
        $this->assertNotNull($createdDniDocument['id'], 'Created DniDocument must have id specified');
        $this->assertNotNull(DniDocument::find($createdDniDocument['id']), 'DniDocument with given id must be in DB');
        $this->assertModelData($dniDocument, $createdDniDocument);
    }

    /**
     * @test read
     */
    public function test_read_dni_document()
    {
        $dniDocument = DniDocument::factory()->create();

        $dbDniDocument = $this->dniDocumentRepo->find($dniDocument->id);

        $dbDniDocument = $dbDniDocument->toArray();
        $this->assertModelData($dniDocument->toArray(), $dbDniDocument);
    }

    /**
     * @test update
     */
    public function test_update_dni_document()
    {
        $dniDocument = DniDocument::factory()->create();
        $fakeDniDocument = DniDocument::factory()->make()->toArray();

        $updatedDniDocument = $this->dniDocumentRepo->update($fakeDniDocument, $dniDocument->id);

        $this->assertModelData($fakeDniDocument, $updatedDniDocument->toArray());
        $dbDniDocument = $this->dniDocumentRepo->find($dniDocument->id);
        $this->assertModelData($fakeDniDocument, $dbDniDocument->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dni_document()
    {
        $dniDocument = DniDocument::factory()->create();

        $resp = $this->dniDocumentRepo->delete($dniDocument->id);

        $this->assertTrue($resp);
        $this->assertNull(DniDocument::find($dniDocument->id), 'DniDocument should not exist in DB');
    }
}
