<?xml version="1.0"?>


<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  
  <xsl:output method="html" indent="yes" encoding="utf-8" />
  <xsl:template match="/">
    <html>
      <head>
        <title>News Article Webpage</title>
        <link rel="stylesheet"
              href="news.css"
              type="text/css"
              media="screen" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&amp;display=swap" 
              rel="stylesheet" />
        <style>

        </style>
      </head>

      <body id="wrapper">
        <h1>	<strong>&#128220;</strong> Winnepeg News <strong>	&#128220;</strong></h1>
        <ul class="menu">
          <a href="https://www.cbc.ca/news" alt="latestNews"><li>Latest News</li></a>
          <a href="https://www.ctvnews.ca/" alt="newsoftheday"><li>News of the Day</li></a>
          <a href="https://globalnews.ca/" alt="citynews"><li>City News</li></a>
          <a href="XML_news_project(Dawra,Smily)" alt="worldnews"><li>World News</li></a>
        </ul>
        <div id="intro">
          <strong>Top News</strong>
          <xsl:for-each select="news">
            <h2>
              <a href="{/news/news_link}" target="_blank" >
              <xsl:value-of select="news_heading" /></a>
            </h2>
            <p><xsl:value-of select="/news/news_link" /></p>
            <p>
              <xsl:value-of select="news_summary" />
              <a href="{/news/news_link}" ><em>read more...</em></a>
            </p>
            <p>
              <h2 id="bottom_border"> &#160;About Us</h2>
              <xsl:value-of select="about_us_paragraph" /><br /><br />
              <xsl:value-of select="about_us_paragraph" />
            </p>
          </xsl:for-each>
        </div>
        
        <xsl:for-each select="/news/news_articles/article" >
          <xsl:sort select="published_date" order="descending" />
          <div id="news_snippet">
            &#160;
            <a href="{link}" target="_blank" >
              <h2>
              <xsl:value-of select="heading" />
              </h2>
            </a>
            <p><xsl:value-of select="published_date" /></p>
            <p><xsl:value-of select="link" /></p>
            <p>
              <xsl:value-of select="summary" />
              <a href="{link}" ><em>read more...</em></a>
            </p>
          </div>
        </xsl:for-each>
        <xsl:call-template name="socialmedia"/>
      </body>
    </html>
  </xsl:template>
 
  <xsl:template name="socialmedia">
    <div id="social">
      <span id="facebook">	&#120307;</span>
      <span id="twiter">	&#128037;</span>
      <span id="instagram">	&#10695;</span>
    </div>
    <div id="footer"><xsl:value-of select="news/footer" /></div>
    
    
  </xsl:template>
  
</xsl:stylesheet>