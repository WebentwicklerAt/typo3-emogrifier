.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _`View helper`:

View helper
===========

Example:
""""""""

::

    lib.css = COA
    lib.css {
        10 = FLUIDTEMPLATE
        10.file = EXT:{$projectKey}/Resources/Public/Css/Newsletter.css
    }

::

    <html data-namespace-typo3-fluid="true"
        xmlns:emogrifier="http://typo3.org/ns/WebentwicklerAt/Emogrifier/ViewHelpers"
        xmlns:f="http://typo3.org/ns/TYPO3/CMS/Fluid/ViewHelpers">
    <emogrifier:emogrify css="{f:cObject(typoscriptObjectPath: 'lib.css')}" extractContent="1">
        <p>Content goes here</p>
    </emogrifier:emogrify>
    </html>

In this example emogrifier is used applied as a view helper in fluid templates. CSS is defined in TypoScript setup and
rendered as a string with ``cObject`` view helper. Only in rare cases it makes sense to use emogrifier as view helper
without ``extractContent="1"``.
