<?php
/**
 * ETabs class file.
 *
 * @author Rodolfo González González
 * @version 2.4.1
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2009 Rodolfo González González
 * @license dual GPL (3.0 or later) and MIT, at your choice.
 * @license http://www.opensource.org/licenses/mit-license.php
 * @license http://www.opensource.org/licenses/gpl-3.0.php
 *
 * See doc/gpl-3.0.txt and doc/MIT-LICENSE.txt for the full text of the
 * licenses.
 *
 * The MIT license:
 *
 * Copyright (c) 2009 Rodolfo González González
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * The GPL license:
 *
 * Copyright (C) 2009 Rodolfo González González
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * -----------------------------------------------------------------------------
 *
 * jQuery UI is bundled under the terms of the MIT or GPL licenses, at your
 * choice. Please see {@link http://docs.jquery.com/Licensing} for details.
 * Rodolfo González González is not related to the jQuery UI development team.
 */

/**
 * ETab is a class with abstracts a panel in a tabpanel
 *
 * @author Rodolfo González González
 */
class ETab extends EJqueryUiWidget
{
   //***************************************************************************
   // Configuration
   //***************************************************************************

   /**
    * Tab title
    *
    * @var string
    */
   protected $title = '';

   //***************************************************************************
   // Internal properties
   //***************************************************************************

   /**
    * Panel body
    *
    * @var string
    */
   private $body = null;

   //***************************************************************************
   // Setters and getters
   //***************************************************************************

   /**
    * Setter
    *
    * @param string $value the title
    */
   public function setTitle($value)
   {
      $this->title = strval($value);
   }

   /**
    * Getter
    *
    * @return string
    */
   public function getTitle()
   {
      return $this->title;
   }

   //***************************************************************************
   // Utilities
   //***************************************************************************

   protected function htmlCode($id)
   {
      $html = CHtml::tag('div', array('id'=>$id, 'title'=>$this->title), $this->body, true);
      return $html;
   }

   //***************************************************************************
   // Run Lola, Run
   //***************************************************************************

   /**
    * Get the panel contents
    */
   public function init()
   {
      if (empty($this->title))
         throw new CException(Yii::t('EjQueryUIWidget', 'title must not be empty.'));
      ob_start();
   }

   /**
    *
    */
   public function run()
   {
      if (is_null($this->body)) {
         $this->body = ob_get_contents();

      }
      ob_end_clean();

      list($name, $id) = $this->resolveNameID();

      echo $this->htmlCode($id);
   }
}