.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _`Content object`:

Content object
==============

Example:
""""""""

::

    page = PAGE
    page {
        typeNum = 0
        config {
            disableAllHeaderCode = 1
            admPanel = 0
            xhtml_cleaning = 0
            contentObjectExceptionHandler = 0
        }
        10 = EMOGRIFIER
        10 {
            css = FLUIDTEMPLATE
            css.file = EXT:{$projectKey}/Resources/Public/Css/Newsletter.css
            html = FLUIDTEMPLATE
            html.file = EXT:{$projectKey}/Resources/Private/Templates/Newsletter.html
        }
    }

In this example a page is defined and all markup rendering is disabled with setting ``disableAllHeaderCode = 1``.
To generate a valid html document the tags have to be defined in the template file, otherwise they will be added
automatically by emogrifier library.

Example:
""""""""

::

    page = PAGE
    page {
        typeNum = 0
        config {
            disableAllHeaderCode = 0
            admPanel = 0
            xhtml_cleaning = 0
            contentObjectExceptionHandler = 0
        }
        10 = EMOGRIFIER
        10 {
            css = COA
            css {
                10 = FLUIDTEMPLATE
                10.file = EXT:{$projectKey}/Resources/Public/Css/Newsletter.css
            }
            html = FLUIDTEMPLATE
            html.file = EXT:{$projectKey}/Resources/Private/Templates/Newsletter.html
            extractContent = 1
        }
    }

In this example a page is defined and the features of PAGE for html rendering are used. Because the rendering of
emogrifier library will contain html, body,... tags too, they are filtered out by activating ``extractContent = 1``.
Styles applied to the body tag and in the document structure above get lost by the extraction.
