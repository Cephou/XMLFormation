<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output 
        method="html"
        encoding="UTF-8"
        indent="yes" />
    

    <xsl:template match="/">
        <xsl:for-each select="repertoire/contact">
            <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-content white-text red darken-1">
                    <span class="card-title">
                        <xsl:value-of select="./firstname" />&#160;<b><xsl:value-of select="./lastname" /></b>
                    </span>
                </div>

                <div class="card-action">
                    <xsl:if test="count(./phones) != 0">
                        <xsl:for-each select="./phones/phone">
                            <div class="valign-wrapper">
                                <i class="material-icons grey-text contact-icon">phone</i>
                                &#160;
                                (<xsl:value-of select="./@type" />)
                                &#160;
                                <xsl:value-of select="." />
                            </div>
                        </xsl:for-each>
                    </xsl:if>
                    
                    <xsl:if test="count(./emails) != 0">
                        <xsl:for-each select="./emails/email">
                            <div class="valign-wrapper">
                                <i class="material-icons grey-text contact-icon">email</i>
                                &#160;
                                <xsl:value-of select="." />
                            </div>
                        </xsl:for-each>
                    </xsl:if>
                </div>
            </div>
        </div>
        </xsl:for-each>
    </xsl:template>
    

</xsl:stylesheet>
