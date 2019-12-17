def application(env, start_response):
    path = env['PATH_INFO']
    if path == '/':
        start_response('200 OK', [('Content-type', 'text/plain; charset=utf-8')])
        return [b'Hello World']
    elif path == '/foo':
        start_response('200 OK', [('Content-type', 'text/plain; charset=utf-8')])
        return [b'foo']
    else:
        start_response('200 OK', [('Content-type', 'text/plain; charset=utf-8')])
        return [b'404 Not Found']
