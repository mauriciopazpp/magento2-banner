<?php

namespace Mauricio\Banner\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$tableName = 'mauricio_banner_banner';

		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists($tableName)) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable($tableName)
			)
				->addColumn(
					'id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Banner ID'
				)
				->addColumn(
					'content',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'64k',
					[],
					'Banner Content'
				)	
				->addColumn(
					'link',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'Banner URL Link'
				)
				->addColumn(
					'enabled',
					\Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
					1,
					[],
					'Banner Status'
				)
				->addColumn(
					'created_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
					'Created At'
				)->addColumn(
					'updated_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
					'Updated At'
				)
				->setComment('Banner Table');
				
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable($tableName),
				$setup->getIdxName(
					$installer->getTable($tableName),
					['id', 'content', 'link', 'enable', 'created_at', 'updated_at'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['id', 'content', 'link', 'enable', 'created_at', 'updated_at'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}