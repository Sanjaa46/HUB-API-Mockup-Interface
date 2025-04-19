<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Show API information
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function info()
    {
        return response()->json([
            'name' => 'HUB API Mockup Interface',
            'description' => 'Temporary mockup for the "Мэдээллийн урсгалыг удирдах орчин" (Information Flow Management Environment)',
            'version' => '1.0.0',
            'graphql_endpoints' => [
                'standard' => url('/graphql'),
                'gateway' => url('/gateway')
            ],
            'documentation' => [
                'readme' => url('/docs/readme'),
                'installation' => url('/docs/installation')
            ],
            'status' => 'operational'
        ]);
    }
    
    /**
     * Provide basic health check
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function healthCheck()
    {
        return response()->json([
            'status' => 'ok',
            'timestamp' => now()->toIso8601String()
        ]);
    }
    
    /**
     * Display README documentation
     *
     * @return \Illuminate\Http\Response
     */
    public function readme()
    {
        return $this->renderMarkdownFile(base_path('README.md'));
    }
    
    /**
     * Display installation guide
     *
     * @return \Illuminate\Http\Response
     */
    public function installation()
    {
        return $this->renderMarkdownFile(base_path('INSTALLATION.md'));
    }
    
    /**
     * Render a markdown file as HTML
     *
     * @param string $path
     * @return \Illuminate\Http\Response
     */
    protected function renderMarkdownFile($path)
    {
        if (!file_exists($path)) {
            return response('Documentation not found', 404);
        }
        
        $markdown = file_get_contents($path);
        $parsedown = new \Parsedown();
        $html = $parsedown->text($markdown);
        
        return response()->view('docs', [
            'content' => $html,
            'title' => basename($path, '.md')
        ]);
    }
}