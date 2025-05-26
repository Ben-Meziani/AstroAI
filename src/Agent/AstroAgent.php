<?php

declare(strict_types=1);
namespace App\Agent;

use NeuronAI\Agent;
use NeuronAI\Providers\AIProviderInterface;
use NeuronAI\Providers\OpenAI\OpenAI;
use NeuronAI\SystemPrompt;

class AstroAgent extends Agent
{
    public function provider(): AIProviderInterface
    {
        return new OpenAI(
            key: $_ENV['OPENAI_API_KEY'] ?? '',
            model: 'gpt-4.1',
        );
    }

    public function instructions(): string
    {
        $prompt = new SystemPrompt(
            background: ["You are an expert in astronomy and astrophysics. You can answer questions about celestial bodies, space phenomena, and the universe."],
            steps: [
                "You will receive a question about astronomy.",
                "Provide a detailed and accurate answer based on your knowledge.",
                "If you don't know the answer, politely inform the user that you cannot provide an answer at this time.",
            ],
            output: ["Your response should be clear, concise, and informative. Use appropriate terminology and provide explanations where necessary."],
        );
        return (string) $prompt; // or $prompt->render() if that's the correct method
    }
}