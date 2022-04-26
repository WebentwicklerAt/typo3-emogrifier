.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _usage:

Usage
=====

The following methods of integration are available:

1. :ref:`Content object`
2. :ref:`User function`
3. :ref:`View helper`


Configuration Reference
=======================

All methods offer the following configuration options:

.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         css

   Data type
         :ref:`cObject <t3tsref:data-type-cobject>`

   Description
         CSS string which is applied to the html.

         **Example:** ::

            page.10 = EMOGRIFIER
            page.10.css = FLUIDTEMPLATE
            page.10.css.file = EXT:{$projectKey}/Resources/Public/Css/Newsletter.css

.. container:: table-row

   Property
         html

   Data type
         :ref:`cObject <t3tsref:data-type-cobject>`

   Description
         HTML string on which the css is applied.

         If the HTML string does not contain html, head, body or Content-Type meta tags, they are added by the emogrifier library automatically.

         **Example:** ::

            page.10 = EMOGRIFIER
            page.10.html = FLUIDTEMPLATE
            page.10.html.file = EXT:{$projectKey}/Resources/Private/Templates/Newsletter.html

.. container:: table-row

   Property
         extractContent

   Data type
         boolean

   Default
         false

   Description
         Extract emogrified content from within body tags.

         To get rid of the automatically added meta tags by the emogrifier library, this can be done by setting extractContent to true.

         **Example:** ::

            page.10 = EMOGRIFIER
            page.10.extractContent = 1

.. container:: table-row

   Property
         options

   Data type
         array

   Default
         []

   Description
         Set options for CssInline.

         **Example:** ::

            page.10 = EMOGRIFIER
            page.10.options.disableStyleBlocksParsing = 1

.. ###### END~OF~TABLE ######
