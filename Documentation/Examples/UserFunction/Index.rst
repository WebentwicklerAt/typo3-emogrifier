.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _`User function`:

User function
=============

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
        stdWrap {
            postUserFunc = WebentwicklerAt\Emogrifier\UserFunctions\Emogrifier->emogrify
            postUserFunc {
                css = COA
                css {
                    10 = FLUIDTEMPLATE
                    10.file = EXT:{$projectKey}/Resources/Public/Css/Newsletter.css
                }
                extractContent = 1
            }
        }
        10 = FLUIDTEMPLATE
        10.file = EXT:{$projectKey}/Resources/Private/Templates/Newsletter.html
    }

In this example the rendering of page and content with FLUIDTEMPLATE is defined as used very often. Processing with
emogrifier is added with ``stdWrap.postUserFunc = WebentwicklerAt\Emogrifier\UserFunctions\Emogrifier->emogrify``.
