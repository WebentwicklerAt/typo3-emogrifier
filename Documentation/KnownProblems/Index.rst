.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _known-problems:

Known Problems
==============

PAGE as html source
-------------------

The page content object can be used on the uppermost level only. Therefore it is *not* possible to use PAGE as an html
source for emogrifier.

Example:
""""""""

::

    page = PAGE
    page {
        typeNum = 0
        config.disableAllHeaderCode = 1
        10 = EMOGRIFIER
        10 {
            css = FILE
            css.file = EXT:{$projectKey}/Resources/Public/Css/Newsletter.css
            html = PAGE
            html {
                10 = FLUIDTEMPLATE
                10.file = EXT:{$projectKey}/Resources/Private/Templates/Newsletter.html
            }
        }
    }

Styles on body tag with extractContent enabled
----------------------------------------------

Because content from within body tags is extracted, styles set on tags on body and outside of it are removed.

Other
-----

To report issues please use issue tracker mentioned under :ref:`links`.
