<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">


    <xsl:output 
        method="html"
        encoding="UTF-8"
        indent="yes" />
    

    <xsl:template match="/">
        <xsl:for-each select="repertoire/contact">
            <xsl:if test="@color = 'red'">
                <xsl:call-template name="contact">
                    <xsl:with-param name="values" select="." />
                </xsl:call-template>
            </xsl:if>
        </xsl:for-each>
    </xsl:template>
    

    <xsl:template name="contact">
        <xsl:param name="values" />
        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-content white-text red darken-1">
                    <span class="card-title">
                        <xsl:value-of select="$values/firstname" />&#160;<b><xsl:value-of select="$values/lastname" /></b>
                    </span>
                </div>

                <div class="card-action">
                    <xsl:if test="count($values/phones) != 0">
                        <xsl:call-template name="displayPhones">
                            <xsl:with-param name="phones" select="$values/phones" />
                        </xsl:call-template>
                    </xsl:if>
                    
                    <xsl:if test="count($values/emails) != 0">
                        <xsl:call-template name="displayEmails">
                            <xsl:with-param name="emails" select="$values/emails" />
                        </xsl:call-template>
                    </xsl:if>
                </div>
            </div>
        </div>
    </xsl:template>
    
    
    <xsl:template name="displayPhones">
        <xsl:param name="phones" />
        <xsl:for-each select="$phones/phone">
            <div class="valign-wrapper">
                <i class="material-icons grey-text contact-icon">phone</i>
                &#160;
                (<xsl:value-of select="$phones/phone/@type" />)
                &#160;
                <xsl:value-of select="$phones/phone" />
            </div>
        </xsl:for-each>
    </xsl:template> 

    
    <xsl:template name="displayEmails">
        <xsl:param name="emails" />    
        <xsl:for-each select="$emails/email">
            <div class="valign-wrapper">
                <i class="material-icons grey-text contact-icon">email</i>
                &#160;
                <xsl:value-of select="$emails/email" />
            </div>
        </xsl:for-each>
    </xsl:template>
    

</xsl:stylesheet>
