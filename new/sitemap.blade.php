xml version="1.0" encoding="UTF-8"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"> 
	@foreach ( $urls as $url )
		<url>
			<loc>{{ $url[ 'url' ] }}</loc>
			<lastmod>{{ date( 'c' ) }}</lastmod>
			<priority>{{ $url[ 'priority' ] }}</priority>
			<changefreq>weekly</changefreq>
		</url>
	@endforeach
</urlset>