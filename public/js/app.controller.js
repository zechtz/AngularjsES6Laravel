'use strict';

export default class MainController {

  constructor($mdSidenav, $mdMedia) {
    this.$mdSidenav  =  $mdSidenav;
    this.$mdMedia    =  $mdMedia;
    this.leftSidebar =  true;
    this.isOpen      =  false;
    this.menu        =  [
      {
        "link"  : "#",
        "title" : "Planning and Budgeting",
        "icon"  : "subject",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/plans",
            "title" : "Activities",
            "state" : "plans",
            "icon"  : "list"
          },
          {
            "link"  : "/#!/revenue-projections",
            "title" : "Revenue Projections",
            "state" : "revenue-projections",
            "icon"  : "attach_money"
          },
          {
            "link"  : "/#!/activity-costing",
            "title" : "Activity Costing",
            "state" : "activity-costing",
            "icon"  : "payment"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Receivables and Payables",
        "icon"  : "receipt",
        "type"  : "category",
        "pages" : [
          {
            "link"  : "/#!/",
            "title" : "Manage Service Providers",
            "state" : "service-providers",
            "icon"  : "rounded_corner"
          },
          {
            "link"  : "/#!/receipts",
            "title" : "Receipts",
            "state" : "receipts",
            "icon"  : "receipt"
          },
          {
            "link"  : "/#!/payments",
            "title" : "Payments",
            "state" : "payments",
            "icon"  : "payment"
          }
        ]
      },
      {
        "link"  : "/#!/reconciliation",
        "title" : "Cash Management",
        "state" : "reconciliation",
        "icon"  : "attach_money",
        "type"  : "category",
        "pages" : [
          {
            "link"  : "/#!/breconciliation",
            "title" : "Bank Reconciliation",
            "state" : "breconciliation",
            "icon"  : "sync"
          },
          {
            "link"  : "/#!/journal-vouchers",
            "title" : "Journal Vouchers",
            "state" : "journal-vouchers",
            "icon"  : "bookmark_outline"
          },
          {
            "link"  : "/#!/bank-charges/new",
            "title" : "Bank Adjustments",
            "state" : "bank-charges.new",
            "icon"  : "bookmar_outline"
          },
          {
            "link"  : "/#!/reconciliation-report",
            "title" : "Bank Reconciliation Report",
            "state" : "reconciliation-report",
            "icon"  : "equalizer"
          },
          {
            "link"  : "/#!/bank-accounts",
            "title" : "Bank Accounts",
            "state" : "bank-accounts",
            "icon"  : "sync"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "COA Segments",
        "icon"  : "subject",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/gfs",
            "title" : "GFS Codes",
            "state" : "gfs",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/projects",
            "title" : "Projects",
            "state" : "projects",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/sub-budgets",
            "title" : "Sub Budget Class",
            "state" : "sub-budgets",
            "icon"  : "store"
          },
          {
            "link"  : "/#!/funding-sources",
            "title" : "Funding Sources",
            "state" : "funding-sources",
            "icon"  : "blur_on"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Reporting",
        "icon"  : "show_chart",
        "type"  : "category",
        "pages" : [
          {
            "link"  : "/#!/cash-books",
            "title" : "Cash Book Report",
            "state" : "cash-books.report",
            "icon"  : "book"
          },
          {
            "link"  : "/#!/ledger",
            "title" : "General Ledger",
            "state" : "ledger",
            "icon"  : "storage"
          },
          {
            "link"  : "#",
            "title" : "Cash Book Entries",
            "state" : "cash-books",
            "icon"  : "insert_drive_file"
          },
          {
            "link"  : "/#!/creditors-report",
            "title" : "Creditors Report",
            "state" : "creditors-report",
            "icon"  : "poll"
          },
          {
            "link"  : "/#!/income-expenditure-report",
            "title" : "Income & Expenditures Report",
            "state" : "income-expenditures-report",
            "icon"  : "art_track"
          },
          {
            "link"  : "/#!/itemized-report",
            "title" : "Itemized Report",
            "state" : "itemized-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/funding-sources-status",
            "title" : "Funding Sources Status",
            "state" : "funding-sources-status",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/facility-activity-expenditure-report",
            "title" : "Activity Expenditure Status",
            "state" : "facility-activity-expenditure-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/facility-activity-budget-report",
            "title" : "Activity Budget Status",
            "state" : "facility-activity-budget-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/facility-activity-input-budget-report",
            "title" : "Itemized Activity Report",
            "state" : "facility-activity-input-budget-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/reconciliation-report",
            "title" : "Bank Reconciliation Report",
            "state" : "reconciliation-report",
            "icon"  : "equalizer"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Reporting",
        "icon"  : "show_chart",
        "type"  : "category",
        "pages": [
          {
            "state" : "fund-source-report",
            "link"  : "/#!/fund-source-report",
            "title" : "Fund Source Report",
            "icon"  : "grid_on"
          },
          {
            "state" : "receipts-and-payments-summary",
            "link"  : "/#!/receipts-and-payments-summary",
            "title" : "Receipts & Payment Summary",
            "icon"  : "show_chart"
          },
          {
            "state" : "tracked-activities",
            "link"  : "/#!/tracked-activities",
            "title" : "Action Tracking",
            "icon"  : "grid_on"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Settings",
        "icon"  : "settings",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/gfs",
            "title" : "GFSCodes",
            "state" : "gfs",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/financial-years",
            "title" : "Financial Years",
            "state" : "financial-years",
            "icon"  : "perm_contact_calendar"
          },
          {
            "link"  : "/#!/funding-sources",
            "title" : "Funding Sources",
            "state" : "funding-sources",
            "icon"  : "blur_on"
          },
          {
            "link"  : "/#!/fund-types",
            "title" : "Fund Types",
            "state" : "fund-types",
            "icon"  : "blur_on"
          },
          {
            "link"  : "/#!/users",
            "title" : "Manage Users",
            "state" : "users",
            "icon"  : "contacts"
          },
          {
            "link"  : "/#!/roles",
            "title" : "Manage User Roles",
            "state" : "roles",
            "icon"  : "contacts"
          },
          {
            "link"  : "/#!/expenditure-types",
            "title" : "Expenditure Types",
            "state" : "expenditure-types",
            "icon"  : "sync"
          },
          {
            "link"  : "/#!/facility-types",
            "title" : "Facility Types",
            "state" : "facility-types",
            "icon"  : "merge_type"
          },
          {
            "link"  : "/#!/facilities",
            "title" : "Facilities",
            "state" : "facilities",
            "icon"  : "store"
          },
          {
            "link"  : "/#!/projects",
            "title" : "Projects",
            "state" : "projects",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/sub-budgets",
            "title" : "Sub Budget Class",
            "state" : "sub-budgets",
            "icon"  : "store"
          },
          {
            "link"  : "/#!/manage-reconciliations",
            "title" : "Manage Bank Reconciliations",
            "state" : "manage-bank-reconciliations",
            "icon"  : "attach_money"
          }
        ]
      },
      {
        "link"  : "/#!/permissions",
        "title" : "Manage Permissions",
        "type"  : "category",
        "icon"  : "code",
        "pages": [
          {
            "link"  : "/#!/menu-categories",
            "title" : "Manage Menu Groups",
            "state" : "menu-categories",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/menu-items",
            "title" : "Menu Items & Permissions",
            "state" : "menu-items",
            "icon"  : "attach_money"
          },
          {
            "link"  : "/#!/manage-roles",
            "title" : "Manage User Roles",
            "state" : "user-roles",
            "icon"  : "attach_money"
          },
          {
            "link"  : "/#!/users",
            "title" : "Users & Permissions",
            "state" : "permissions",
            "icon"  : "code"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Planning and Budgeting",
        "icon"  : "subject",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/plans",
            "title" : "Activities",
            "state" : "plans",
            "icon"  : "list"
          },
          {
            "link"  : "/#!/revenue-projections",
            "title" : "Revenue Projections",
            "state" : "revenue-projections",
            "icon"  : "attach_money"
          },
          {
            "link"  : "/#!/activity-costing",
            "title" : "Activity Costing",
            "state" : "activity-costing",
            "icon"  : "payment"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Receivables and Payables",
        "icon"  : "receipt",
        "type"  : "category",
        "pages" : [
          {
            "link"  : "/#!/",
            "title" : "Manage Suppliers & Customers",
            "state" : "service-providers",
            "icon"  : "rounded_corner"
          },
          {
            "link"  : "/#!/receipts",
            "title" : "Receipts",
            "state" : "receipts",
            "icon"  : "receipt"
          },
          {
            "link"  : "/#!/payments",
            "title" : "Payments",
            "state" : "payments",
            "icon"  : "payment"
          }
        ]
      },
      {
        "link"  : "/#!/reconciliation",
        "title" : "Cash Management",
        "state" : "reconciliation",
        "icon"  : "attach_money",
        "type"  : "category",
        "pages" : [
          {
            "link"  : "/#!/breconciliation",
            "title" : "Bank Reconciliation",
            "state" : "breconciliation",
            "icon"  : "sync"
          },
          {
            "link"  : "/#!/journal-vouchers",
            "title" : "Journal Vouchers",
            "state" : "journal-vouchers",
            "icon"  : "bookmark_outline"
          },
          {
            "link"  : "/#!/bank-charges/new",
            "title" : "Bank Charges And Adjustments",
            "state" : "bank-charges.new",
            "icon"  : "bookmar_outline"
          },
          {
            "link"  : "/#!/reconciliation-report",
            "title" : "Bank Reconciliation Report",
            "state" : "reconciliation-report",
            "icon"  : "equalizer"
          },
          {
            "link"  : "/#!/bank-accounts",
            "title" : "Bank Accounts",
            "state" : "bank-accounts",
            "icon"  : "sync"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Reporting",
        "icon"  : "show_chart",
        "type"  : "category",
        "pages" : [
          {
            "link"  : "/#!/cash-books",
            "title" : "Cash Book Report",
            "state" : "cash-books.report",
            "icon"  : "book"
          },
          {
            "link"  : "/#!/ledger",
            "title" : "General Ledger",
            "state" : "ledger",
            "icon"  : "storage"
          },
          {
            "link"  : "#",
            "title" : "Cash Book Entries",
            "state" : "cash-books",
            "icon"  : "insert_drive_file"
          },
          {
            "link"  : "/#!/creditors-report",
            "title" : "Creditors Report",
            "state" : "creditors-report",
            "icon"  : "poll"
          },
          {
            "link"  : "/#!/income-expenditure-report",
            "title" : "Income & Expenditures Report",
            "state" : "income-expenditures-report",
            "icon"  : "art_track"
          },
          {
            "link"  : "/#!/funding-sources-status",
            "title" : "Funding Sources Status",
            "state" : "funding-sources-status",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/facility-activity-expenditure-report",
            "title" : "Activity Expenditure Status",
            "state" : "facility-activity-expenditure-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/facility-activity-budget-report",
            "title" : "Activity Budget Status",
            "state" : "facility-activity-budget-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/facility-activity-input-budget-report",
            "title" : "Itemized Activity Report",
            "state" : "facility-activity-input-budget-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/reconciliation-report",
            "title" : "Bank Reconciliation Report",
            "state" : "reconciliation-report",
            "icon"  : "equalizer"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "COA Segments",
        "icon"  : "subject",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/gfs",
            "title" : "GFS Codes",
            "state" : "gfs",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/projects",
            "title" : "Projects",
            "state" : "projects",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/sub-budgets",
            "title" : "Sub Budget Class",
            "state" : "sub-budgets",
            "icon"  : "store"
          },
          {
            "link"  : "/#!/funding-sources",
            "title" : "Funding Sources",
            "state" : "funding-sources",
            "icon"  : "blur_on"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Reporting",
        "icon"  : "show_chart",
        "type"  : "category",
        "pages": [
          {
            "state" : "facility-fund-source-report",
            "link"  : "/#!/facility-fund-source-report",
            "title" : "Fund Source Report",
            "icon"  : "grid_on"
          },
          {
            "state" : "receipts-and-payments-summary.region.council",
            "link"  : "/#!/receipts-and-payments-region-council-summary",
            "title" : "Receipts & Payment Summary",
            "icon"  : "show_chart"
          },
          {
            "link"  : "/#!/facility-gfs-code-report",
            "title" : "GFS Report",
            "state" : "facility-gfs-code-report",
            "icon"  : "code"
          }
        ]
      },
      {
        "link"  : "/#!/facilities",
        "title" : "Manage Facilities",
        "state" : "facilities",
        "icon"  : "dialpad",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/facilities",
            "title" : "Facilities",
            "state" : "facilities",
            "icon"  : "store"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Settings",
        "icon"  : "settings",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/users",
            "title" : "Manage Users",
            "state" : "users",
            "icon"  : "contacts"
          },
          {
            "link"  : "/#!/transaction-types",
            "title" : "Transaction Types",
            "state" : "transaction-types",
            "icon"  : "sync"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "COA Segments",
        "icon"  : "subject",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/gfs",
            "title" : "GFS Codes",
            "state" : "gfs",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/projects",
            "title" : "Projects",
            "state" : "projects",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/sub-budgets",
            "title" : "Sub Budget Class",
            "state" : "sub-budgets",
            "icon"  : "store"
          },
          {
            "link"  : "/#!/funding-sources",
            "title" : "Funding Sources",
            "state" : "funding-sources",
            "icon"  : "blur_on"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Reporting",
        "icon"  : "show_chart",
        "type"  : "category",
        "pages": [
          {
            "state" : "lga-fund-source-report",
            "link"  : "/#!/lga-fund-source-report",
            "title" : "Fund Source Report",
            "icon"  : "grid_on"
          },
          {
            "link"  : "/#!/lga-gfs-report",
            "title" : "GFS Report",
            "state" : "lga-gfs-report",
            "icon"  : "code"
          },
          {
            "state" : "receipts-and-payments-summary.region",
            "link"  : "/#!/receipts-and-payments-region-council-summary",
            "title" : "Receipts & Payment Summary",
            "icon"  : "show_chart"
          }
        ]
      },
      {
        "link"  : "/#!/permissions",
        "title" : "Manage Permissions",
        "type"  : "category",
        "icon"  : "code",
        "pages": [
          {
            "link"  : "/#!/users",
            "title" : "Manage Users",
            "state" : "users",
            "icon"  : "contacts"
          },
          {
            "link"  : "/#!/menu-categories",
            "title" : "Manage Menu Groups",
            "state" : "menu-categories",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/menu-items",
            "title" : "Menu Items & Permissions",
            "state" : "menu-items",
            "icon"  : "attach_money"
          },
          {
            "link"  : "/#!/manage-roles",
            "title" : "Manage User Roles",
            "state" : "user-roles",
            "icon"  : "attach_money"
          },
          {
            "link"  : "/#!/levels",
            "title" : "Manage Admin Hierarcy Levels",
            "state" : "levels",
            "icon"  : "code"
          }
        ]
      }
    ];
  }

  swipeLeft() {
    this.$mdSidenav('left').toggle().then(function(){
    });
  }

  showHamburger() {
    return (!this.leftSidebar || !this.$mdMedia('gt-md'));
  }

  showLeft() {
    this.leftSidebar = true;
    this.$mdSidenav('left').open().then(function() {
    });
  }

  closeLeft() {
    this.$mdSidenav('left').close().then(function() {
      this.leftSidebar = false;
    });
  }

  toggleSidenav(menuId) {
    this.$mdSidenav(menuId).toggle();
  }

  menu() {
    return [
      {
        "link"  : "#",
        "title" : "Planning and Budgeting",
        "icon"  : "subject",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/plans",
            "title" : "Activities",
            "state" : "plans",
            "icon"  : "list"
          },
          {
            "link"  : "/#!/revenue-projections",
            "title" : "Revenue Projections",
            "state" : "revenue-projections",
            "icon"  : "attach_money"
          },
          {
            "link"  : "/#!/activity-costing",
            "title" : "Activity Costing",
            "state" : "activity-costing",
            "icon"  : "payment"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Receivables and Payables",
        "icon"  : "receipt",
        "type"  : "category",
        "pages" : [
          {
            "link"  : "/#!/",
            "title" : "Manage Service Providers",
            "state" : "service-providers",
            "icon"  : "rounded_corner"
          },
          {
            "link"  : "/#!/receipts",
            "title" : "Receipts",
            "state" : "receipts",
            "icon"  : "receipt"
          },
          {
            "link"  : "/#!/payments",
            "title" : "Payments",
            "state" : "payments",
            "icon"  : "payment"
          }
        ]
      },
      {
        "link"  : "/#!/reconciliation",
        "title" : "Cash Management",
        "state" : "reconciliation",
        "icon"  : "attach_money",
        "type"  : "category",
        "pages" : [
          {
            "link"  : "/#!/breconciliation",
            "title" : "Bank Reconciliation",
            "state" : "breconciliation",
            "icon"  : "sync"
          },
          {
            "link"  : "/#!/journal-vouchers",
            "title" : "Journal Vouchers",
            "state" : "journal-vouchers",
            "icon"  : "bookmark_outline"
          },
          {
            "link"  : "/#!/bank-charges/new",
            "title" : "Bank Adjustments",
            "state" : "bank-charges.new",
            "icon"  : "bookmar_outline"
          },
          {
            "link"  : "/#!/reconciliation-report",
            "title" : "Bank Reconciliation Report",
            "state" : "reconciliation-report",
            "icon"  : "equalizer"
          },
          {
            "link"  : "/#!/bank-accounts",
            "title" : "Bank Accounts",
            "state" : "bank-accounts",
            "icon"  : "sync"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "COA Segments",
        "icon"  : "subject",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/gfs",
            "title" : "GFS Codes",
            "state" : "gfs",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/projects",
            "title" : "Projects",
            "state" : "projects",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/sub-budgets",
            "title" : "Sub Budget Class",
            "state" : "sub-budgets",
            "icon"  : "store"
          },
          {
            "link"  : "/#!/funding-sources",
            "title" : "Funding Sources",
            "state" : "funding-sources",
            "icon"  : "blur_on"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Reporting",
        "icon"  : "show_chart",
        "type"  : "category",
        "pages" : [
          {
            "link"  : "/#!/cash-books",
            "title" : "Cash Book Report",
            "state" : "cash-books.report",
            "icon"  : "book"
          },
          {
            "link"  : "/#!/ledger",
            "title" : "General Ledger",
            "state" : "ledger",
            "icon"  : "storage"
          },
          {
            "link"  : "#",
            "title" : "Cash Book Entries",
            "state" : "cash-books",
            "icon"  : "insert_drive_file"
          },
          {
            "link"  : "/#!/creditors-report",
            "title" : "Creditors Report",
            "state" : "creditors-report",
            "icon"  : "poll"
          },
          {
            "link"  : "/#!/income-expenditure-report",
            "title" : "Income & Expenditures Report",
            "state" : "income-expenditures-report",
            "icon"  : "art_track"
          },
          {
            "link"  : "/#!/itemized-report",
            "title" : "Itemized Report",
            "state" : "itemized-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/funding-sources-status",
            "title" : "Funding Sources Status",
            "state" : "funding-sources-status",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/facility-activity-expenditure-report",
            "title" : "Activity Expenditure Status",
            "state" : "facility-activity-expenditure-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/facility-activity-budget-report",
            "title" : "Activity Budget Status",
            "state" : "facility-activity-budget-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/facility-activity-input-budget-report",
            "title" : "Itemized Activity Report",
            "state" : "facility-activity-input-budget-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/reconciliation-report",
            "title" : "Bank Reconciliation Report",
            "state" : "reconciliation-report",
            "icon"  : "equalizer"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Reporting",
        "icon"  : "show_chart",
        "type"  : "category",
        "pages": [
          {
            "state" : "fund-source-report",
            "link"  : "/#!/fund-source-report",
            "title" : "Fund Source Report",
            "icon"  : "grid_on"
          },
          {
            "state" : "receipts-and-payments-summary",
            "link"  : "/#!/receipts-and-payments-summary",
            "title" : "Receipts & Payment Summary",
            "icon"  : "show_chart"
          },
          {
            "state" : "tracked-activities",
            "link"  : "/#!/tracked-activities",
            "title" : "Action Tracking",
            "icon"  : "grid_on"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Settings",
        "icon"  : "settings",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/gfs",
            "title" : "GFSCodes",
            "state" : "gfs",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/financial-years",
            "title" : "Financial Years",
            "state" : "financial-years",
            "icon"  : "perm_contact_calendar"
          },
          {
            "link"  : "/#!/funding-sources",
            "title" : "Funding Sources",
            "state" : "funding-sources",
            "icon"  : "blur_on"
          },
          {
            "link"  : "/#!/fund-types",
            "title" : "Fund Types",
            "state" : "fund-types",
            "icon"  : "blur_on"
          },
          {
            "link"  : "/#!/users",
            "title" : "Manage Users",
            "state" : "users",
            "icon"  : "contacts"
          },
          {
            "link"  : "/#!/roles",
            "title" : "Manage User Roles",
            "state" : "roles",
            "icon"  : "contacts"
          },
          {
            "link"  : "/#!/expenditure-types",
            "title" : "Expenditure Types",
            "state" : "expenditure-types",
            "icon"  : "sync"
          },
          {
            "link"  : "/#!/facility-types",
            "title" : "Facility Types",
            "state" : "facility-types",
            "icon"  : "merge_type"
          },
          {
            "link"  : "/#!/facilities",
            "title" : "Facilities",
            "state" : "facilities",
            "icon"  : "store"
          },
          {
            "link"  : "/#!/projects",
            "title" : "Projects",
            "state" : "projects",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/sub-budgets",
            "title" : "Sub Budget Class",
            "state" : "sub-budgets",
            "icon"  : "store"
          },
          {
            "link"  : "/#!/manage-reconciliations",
            "title" : "Manage Bank Reconciliations",
            "state" : "manage-bank-reconciliations",
            "icon"  : "attach_money"
          }
        ]
      },
      {
        "link"  : "/#!/permissions",
        "title" : "Manage Permissions",
        "type"  : "category",
        "icon"  : "code",
        "pages": [
          {
            "link"  : "/#!/menu-categories",
            "title" : "Manage Menu Groups",
            "state" : "menu-categories",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/menu-items",
            "title" : "Menu Items & Permissions",
            "state" : "menu-items",
            "icon"  : "attach_money"
          },
          {
            "link"  : "/#!/manage-roles",
            "title" : "Manage User Roles",
            "state" : "user-roles",
            "icon"  : "attach_money"
          },
          {
            "link"  : "/#!/users",
            "title" : "Users & Permissions",
            "state" : "permissions",
            "icon"  : "code"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Planning and Budgeting",
        "icon"  : "subject",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/plans",
            "title" : "Activities",
            "state" : "plans",
            "icon"  : "list"
          },
          {
            "link"  : "/#!/revenue-projections",
            "title" : "Revenue Projections",
            "state" : "revenue-projections",
            "icon"  : "attach_money"
          },
          {
            "link"  : "/#!/activity-costing",
            "title" : "Activity Costing",
            "state" : "activity-costing",
            "icon"  : "payment"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Receivables and Payables",
        "icon"  : "receipt",
        "type"  : "category",
        "pages" : [
          {
            "link"  : "/#!/",
            "title" : "Manage Suppliers & Customers",
            "state" : "service-providers",
            "icon"  : "rounded_corner"
          },
          {
            "link"  : "/#!/receipts",
            "title" : "Receipts",
            "state" : "receipts",
            "icon"  : "receipt"
          },
          {
            "link"  : "/#!/payments",
            "title" : "Payments",
            "state" : "payments",
            "icon"  : "payment"
          }
        ]
      },
      {
        "link"  : "/#!/reconciliation",
        "title" : "Cash Management",
        "state" : "reconciliation",
        "icon"  : "attach_money",
        "type"  : "category",
        "pages" : [
          {
            "link"  : "/#!/breconciliation",
            "title" : "Bank Reconciliation",
            "state" : "breconciliation",
            "icon"  : "sync"
          },
          {
            "link"  : "/#!/journal-vouchers",
            "title" : "Journal Vouchers",
            "state" : "journal-vouchers",
            "icon"  : "bookmark_outline"
          },
          {
            "link"  : "/#!/bank-charges/new",
            "title" : "Bank Charges And Adjustments",
            "state" : "bank-charges.new",
            "icon"  : "bookmar_outline"
          },
          {
            "link"  : "/#!/reconciliation-report",
            "title" : "Bank Reconciliation Report",
            "state" : "reconciliation-report",
            "icon"  : "equalizer"
          },
          {
            "link"  : "/#!/bank-accounts",
            "title" : "Bank Accounts",
            "state" : "bank-accounts",
            "icon"  : "sync"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Reporting",
        "icon"  : "show_chart",
        "type"  : "category",
        "pages" : [
          {
            "link"  : "/#!/cash-books",
            "title" : "Cash Book Report",
            "state" : "cash-books.report",
            "icon"  : "book"
          },
          {
            "link"  : "/#!/ledger",
            "title" : "General Ledger",
            "state" : "ledger",
            "icon"  : "storage"
          },
          {
            "link"  : "#",
            "title" : "Cash Book Entries",
            "state" : "cash-books",
            "icon"  : "insert_drive_file"
          },
          {
            "link"  : "/#!/creditors-report",
            "title" : "Creditors Report",
            "state" : "creditors-report",
            "icon"  : "poll"
          },
          {
            "link"  : "/#!/income-expenditure-report",
            "title" : "Income & Expenditures Report",
            "state" : "income-expenditures-report",
            "icon"  : "art_track"
          },
          {
            "link"  : "/#!/funding-sources-status",
            "title" : "Funding Sources Status",
            "state" : "funding-sources-status",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/facility-activity-expenditure-report",
            "title" : "Activity Expenditure Status",
            "state" : "facility-activity-expenditure-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/facility-activity-budget-report",
            "title" : "Activity Budget Status",
            "state" : "facility-activity-budget-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/facility-activity-input-budget-report",
            "title" : "Itemized Activity Report",
            "state" : "facility-activity-input-budget-report",
            "icon"  : "sort"
          },
          {
            "link"  : "/#!/reconciliation-report",
            "title" : "Bank Reconciliation Report",
            "state" : "reconciliation-report",
            "icon"  : "equalizer"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "COA Segments",
        "icon"  : "subject",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/gfs",
            "title" : "GFS Codes",
            "state" : "gfs",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/projects",
            "title" : "Projects",
            "state" : "projects",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/sub-budgets",
            "title" : "Sub Budget Class",
            "state" : "sub-budgets",
            "icon"  : "store"
          },
          {
            "link"  : "/#!/funding-sources",
            "title" : "Funding Sources",
            "state" : "funding-sources",
            "icon"  : "blur_on"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Reporting",
        "icon"  : "show_chart",
        "type"  : "category",
        "pages": [
          {
            "state" : "facility-fund-source-report",
            "link"  : "/#!/facility-fund-source-report",
            "title" : "Fund Source Report",
            "icon"  : "grid_on"
          },
          {
            "state" : "receipts-and-payments-summary.region.council",
            "link"  : "/#!/receipts-and-payments-region-council-summary",
            "title" : "Receipts & Payment Summary",
            "icon"  : "show_chart"
          },
          {
            "link"  : "/#!/facility-gfs-code-report",
            "title" : "GFS Report",
            "state" : "facility-gfs-code-report",
            "icon"  : "code"
          }
        ]
      },
      {
        "link"  : "/#!/facilities",
        "title" : "Manage Facilities",
        "state" : "facilities",
        "icon"  : "dialpad",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/facilities",
            "title" : "Facilities",
            "state" : "facilities",
            "icon"  : "store"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Settings",
        "icon"  : "settings",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/users",
            "title" : "Manage Users",
            "state" : "users",
            "icon"  : "contacts"
          },
          {
            "link"  : "/#!/transaction-types",
            "title" : "Transaction Types",
            "state" : "transaction-types",
            "icon"  : "sync"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "COA Segments",
        "icon"  : "subject",
        "type"  : "category",
        "pages": [
          {
            "link"  : "/#!/gfs",
            "title" : "GFS Codes",
            "state" : "gfs",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/projects",
            "title" : "Projects",
            "state" : "projects",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/sub-budgets",
            "title" : "Sub Budget Class",
            "state" : "sub-budgets",
            "icon"  : "store"
          },
          {
            "link"  : "/#!/funding-sources",
            "title" : "Funding Sources",
            "state" : "funding-sources",
            "icon"  : "blur_on"
          }
        ]
      },
      {
        "link"  : "#",
        "title" : "Reporting",
        "icon"  : "show_chart",
        "type"  : "category",
        "pages": [
          {
            "state" : "lga-fund-source-report",
            "link"  : "/#!/lga-fund-source-report",
            "title" : "Fund Source Report",
            "icon"  : "grid_on"
          },
          {
            "link"  : "/#!/lga-gfs-report",
            "title" : "GFS Report",
            "state" : "lga-gfs-report",
            "icon"  : "code"
          },
          {
            "state" : "receipts-and-payments-summary.region",
            "link"  : "/#!/receipts-and-payments-region-council-summary",
            "title" : "Receipts & Payment Summary",
            "icon"  : "show_chart"
          }
        ]
      },
      {
        "link"  : "/#!/permissions",
        "title" : "Manage Permissions",
        "type"  : "category",
        "icon"  : "code",
        "pages": [
          {
            "link"  : "/#!/users",
            "title" : "Manage Users",
            "state" : "users",
            "icon"  : "contacts"
          },
          {
            "link"  : "/#!/menu-categories",
            "title" : "Manage Menu Groups",
            "state" : "menu-categories",
            "icon"  : "code"
          },
          {
            "link"  : "/#!/menu-items",
            "title" : "Menu Items & Permissions",
            "state" : "menu-items",
            "icon"  : "attach_money"
          },
          {
            "link"  : "/#!/manage-roles",
            "title" : "Manage User Roles",
            "state" : "user-roles",
            "icon"  : "attach_money"
          },
          {
            "link"  : "/#!/levels",
            "title" : "Manage Admin Hierarcy Levels",
            "state" : "levels",
            "icon"  : "code"
          }
        ]
      }
    ];
  }
}
