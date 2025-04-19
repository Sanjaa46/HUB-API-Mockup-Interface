<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - HUB API Mockup</title>
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        pre {
            background-color: #f5f5f5;
            padding: 16px;
            border-radius: 4px;
            overflow-x: auto;
        }
        
        code {
            font-family: SFMono-Regular, Consolas, "Liberation Mono", Menlo, monospace;
            background-color: #f5f5f5;
            padding: 2px 4px;
            border-radius: 3px;
        }
        
        pre code {
            padding: 0;
            background-color: transparent;
        }
        
        h1, h2, h3, h4, h5, h6 {
            margin-top: 24px;
            margin-bottom: 16px;
            font-weight: 600;
            line-height: 1.25;
        }
        
        h1 { font-size: 2em; border-bottom: 1px solid #eaecef; padding-bottom: 0.3em; }
        h2 { font-size: 1.5em; border-bottom: 1px solid #eaecef; padding-bottom: 0.3em; }
        
        a {
            color: #0366d6;
            text-decoration: none;
        }
        
        a:hover {
            text-decoration: underline;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        
        table, th, td {
            border: 1px solid #dfe2e5;
        }
        
        th, td {
            padding: 12px 16px;
            text-align: left;
        }
        
        th {
            background-color: #f6f8fa;
            font-weight: 600;
        }
        
        blockquote {
            margin: 0;
            padding: 0 1em;
            color: #6a737d;
            border-left: 0.25em solid #dfe2e5;
        }
        
        header {
            margin-bottom: 30px;
            border-bottom: 1px solid #eaecef;
            padding-bottom: 10px;
        }
        
        header h1 {
            border-bottom: none;
            padding-bottom: 0;
        }
        
        header nav a {
            margin-right: 15px;
        }
        
        footer {
            margin-top: 50px;
            border-top: 1px solid #eaecef;
            padding-top: 20px;
            color: #6a737d;
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <header>
        <h1>HUB API Mockup</h1>
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/docs/readme') }}">README</a>
            <a href="{{ url('/docs/installation') }}">Installation Guide</a>
            <a href="{{ url('/graphql-playground') }}">GraphQL Playground</a>
        </nav>
    </header>
    
    <main>
        {!! $content !!}
    </main>
    
    <footer>
        <p>This is a temporary mockup interface for the "Мэдээллийн урсгалыг удирдах орчин" (Information Flow Management Environment).</p>
        <p>&copy; {{ date('Y') }} - For internal development use only</p>
    </footer>
</body>
</html>