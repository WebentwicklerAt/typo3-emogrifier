.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _configuration:

Configuration Reference
=======================


.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         css

   Data type
         :ref:`cObject <t3tsref:data-type-cobject>`

   Description
         CSS string which is applied to html.


.. container:: table-row

   Property
         html

   Data type
         :ref:`cObject <t3tsref:data-type-cobject>`

   Description
         HTML string on which the css is applied.


.. ###### END~OF~TABLE ######

.. _configuration-examples:

Example:
""""""""

In this example a page is defined, css is loaded with FILE and html is rendered by FLUIDTEMPLATE for EMOGRIFIER.

::

   page = PAGE
   page.typeNum = 0
   page.config.disableAllHeaderCode = 1
   page.10 = EMOGRIFIER
   page.10.css = COA
   page.10.css.10 = FILE
   page.10.css.10.file = EXT:{$projectKey}/Resources/Public/Css/Newsletter.css
   page.10.html = FLUIDTEMPLATE
   page.10.html.file = EXT:{$projectKey}/Resources/Private/Templates/Newsletter.html
