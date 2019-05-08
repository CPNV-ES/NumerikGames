class Student < ActiveRecord::Base
  has_many :messages
  belongs_to :classes
  validates :lastname, presence: true, length: { minimum: 3, maximum: 15 }
  validates :firstname, presence: true,  length: { minimum: 3, maximum: 15 }


  def to_s
    "#{firstname} #{lastname}"
  end
end
