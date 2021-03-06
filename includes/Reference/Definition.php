<?php

namespace Arctic\Reference;

class Definition
{
	const TYPE_SINGLE = 'single';
	const TYPE_MULTIPLE = 'multiple';

	protected $_name;
	protected $_type;
	protected $_model_class;
	protected $_sub_api_path;
	protected $_mapping;
	protected $_embed_in_parent;

	/**
	 * @param string $_type
	 * @param string $_name
	 * @param string $_model_class
	 * @param string|null $_sub_api_path
	 * @param array $_mapping
	 * @param bool $embed_in_parent
	 */
	public function __construct($_type, $_name,  $_model_class, $_sub_api_path=null, array $_mapping=null, $embed_in_parent=false) {
		$this->_mapping = $_mapping;
		$this->_name = $_name;
		$this->_model_class = $_model_class;
		$this->_sub_api_path = $_sub_api_path;
		$this->_type = $_type;
		$this->_embed_in_parent = $embed_in_parent;
	}

	/**
	 * @return array
	 */
	public function getMapping() {
		return (array)$this->_mapping;
	}

	/**
	 * @return string
	 */
	public function getModelClass() {
		return $this->_model_class;
	}

	/**
	 * @return string|null
	 */
	public function getSubApiPath() {
		return $this->_sub_api_path;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->_type;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->_name;
	}

	/**
	 * Certain references can be written directly (embedded in the parent object).
	 * @return bool
	 */
	public function getEmbedInParent() {
		return $this->_embed_in_parent;
	}

	public function initiateBlankReference( $model  ) {
		if ( $this->_type === self::TYPE_MULTIPLE ) {
			return new SetWrapper($model, $this);
		}
		return new Wrapper($model, $this);
	}

	public function initiateReferenceData( $model , $data ) {
		if ( $this->_type === self::TYPE_MULTIPLE ) {
			return new SetWrapper($model,  $this, $data);
		}
		return new Wrapper($model, $this, $data);
	}

	public function isReferenceSet( $value ) {
		if ( $this->_type === self::TYPE_MULTIPLE ) {
			return true;
		}

		/** @var Wrapper $value */
		return $value->isDefined();
	}
}
