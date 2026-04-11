<?php 

namespace Davidlares\GS1\AI\Tests\Feature;

use Davidlares\GS1\AI\DTO\Identifier as IdentifierDTO;
use Davidlares\GS1\AI\Facades\Identifier;
use Davidlares\GS1\AI\Tests\TestCase;
use Illuminate\Support\Facades\Http;

class IdentifierTest extends TestCase
{
    /** @test */
    public function it_can_fetch_and_parse_a_gs1_identifier()
    {
        // faking request
        Http::fake(['*/identifiers/01' => 
            Http::response([
                'data' => [
                    'general' => [
                        'description' => 'Global Trade Item Number (GTIN)',
                        'title' => 'GTIN',
                        'ai' => '01',
                        'regex' => '(\d{14})',
                    ],
                    'exclusions' => ["02", "03", "255", "37"],
                    'validations' => [
                        ['fixed_length' => true, 'length' => 14]
                    ]
                ]
            ], 200),
        ]);
        // calling identifier
        $result = Identifier::find('01');
        // asserts
        $this->assertEquals('GTIN', $result->general->title);
        $this->assertContains('02', $result->exclusions->first()->ais());
        $this->assertEquals(14, $result->validations->first()->length);
    }

    /** @test */
    public function it_returns_null_when_identifier_is_not_found()
    {
        // faking request
        Http::fake([
            '*/identifiers/999' => Http::response([
                'error' => 'AI not found'
            ], 404),
        ]);
        // verifying null (no AI found)
        $this->expectExceptionMessage("API request failed. Identifier not found");
        $this->expectException(\Exception::class);
        // asking for identifier
        Identifier::find('999');
    }
}